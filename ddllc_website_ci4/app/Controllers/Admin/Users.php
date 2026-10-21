<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Models\UserIdentityModel;

/**
 * Admin User Managment Controller
 * 
 * This controller handles all user-related operations within the admin panel, 
 * and profile management within the application.
 * 
 */
class Users extends BaseController
{
    protected $userModel;

    public function __construct(){
        $this->userModel = model(UserModel::class);
    }
    /**
     * 
     * Show a list if current application Users
     * 
     */
    public function index()
    {   
        // Get search query
        $search = $this->request->getGet('search');
        $active = $this->request->getGet('active') ?? 'true';

        $this->userModel->join('auth_identities', 'auth_identities.user_id = users.id', 'inner');

        // Get total number of users for display
        $user_total = $this->userModel->countAllResults(false); // false to not reset the query builder

        // Apply active filter if provided (check if the user is active or inactive)
        $userActiveStatus = $active === "false" ? false : true;
        $this->userModel->where('users.active', $userActiveStatus);

        // Apply search filter if search terms
        if(!empty($search)){
            // Basic search across username, email, first_name, last_name
            $this->userModel
            ->groupStart() // Groups OR logic so it doesn't break other WHERE clauses
                ->like('users.username', $search)
                ->orLike('auth_identities.secret', $search)
            ->groupEnd();
        }
        
        // Get user results for pagination
        $users = $this->userModel->paginate();
        $pager = $this->userModel->pager;// Pager links

        // Render view with users data
        return $this->renderView('admin/users/index',[
            'title' => 'User Managment',
            // Query parameters
            'users' => $users,
            'user_total' => $user_total,
            'pager' => $pager,
            'search' => $search,
            'active'=> $active,
        ]);
    }
    /**
     * Create new User
     * @return string
     */
    public function new() {
        // Get unique groups from the auth_groups_users table
        $db = \Config\Database::connect();
        $groups = $db->table('auth_groups_users')
            ->select('`group`')
            ->distinct()
            ->get()
            ->getResultArray();

        return $this->renderView('admin/users/form',[
            'title' => 'Create New User',
            'user' => null,
            'groups' => $groups,
            'userGroups' => [],
            'action' => site_url('admin/users/create'),
        ]);
    }

    public function create()
    {
        // 1. Get the official Shield User Provider (Model)
        $userProvider = auth()->getProvider();

        // Validate input
        $rules = [
            'username' => 'required|min_length[3]|max_length[30]|alpha_numeric_space|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[auth_identities.secret]',
            'password' => 'required|strong_password',
            'password_confirm' => 'required|matches[password]',
            'groups' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Instantiate a clean Shield User Entity
        $user = new \CodeIgniter\Shield\Entities\User([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        // 3. Save the user record to the main database
        if (! $userProvider->save($user)) {
            // Returns validation errors if the email/username is already taken
            return redirect()->back()->withInput()->with('errors', $userProvider->errors());
        }

        // 4. Retrieve the fully hydrated user object with its assigned database ID
        $user = $userProvider->findById($userProvider->getInsertID());

        // 5. Assign a security role group (e.g., 'user', 'admin')
        // Add user to groups
        $groups = $this->request->getPost('groups');
        foreach ($groups as $group) {
            $user->addGroup($group);
        }

        // 6. Optional: Activate the account immediately (bypasses email validation rules)
        $user->activate();


        return redirect()->to('admin/users')->with('success', 'User created successfully.');
    }

    /**
     * Edit Current User Credecials
     * 
     * @param mixed $id
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function edit($id = null)
    {
        // Get User by ID
        $user = $this->userModel->findById($id);

        if (!$user) {
            return redirect()->to(site_url('admin/users'))->with('error', 'User not found.');
        }

        // Returns the identity record if it exists, or null
        $identityModel = model(UserIdentityModel::class);
        // Returns the identity record if it exists, or null
        $identity = $identityModel->getIdentityByType($user, 'email_activate');

        // if ($identity !== null) {
        //     // User still has a pending email activation record
        // }

        // Get unique groups from the auth_groups_users table
        $db = \Config\Database::connect();
        $groups = $db->table('auth_groups_users')
            ->select('`group`')
            ->distinct()
            ->get()
            ->getResultArray();

        // Get user groups
        $userGroups = $user->getGroups();

        return $this->renderView('admin/users/form',[
            'title' => 'Edit User',
            'action' => base_url('admin/users/update/' . $user->id),
            'user' => $user,
            'groups' => $groups,
            'userGroups' => $userGroups,
            'pendingActivation' => $identity !== null,
        ]);
    }
    /**
     * Update User Information
     * 
     * @param mixed $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update($id = null)
    {

        $userProvider = auth()->getProvider();
        // Get user
        $user = $userProvider->findById($id);

        // Check if user exists
        if (!$user) {
            return redirect()->to('admin/users')->with('error', 'User not found.');
        }

        // Check is User is being banned or unbanned
        $status = $this->request->getPost('status');

        if ($status === 'banned') {
            // Prevent admin from banning their own account
            if( $user->id === auth()->id()){
                return redirect()->to('admin/users')->with('error', 'You cannot ban your own account. What!? Lol.');
            }
            // Check for banning, validate status message
            if (!$this->validate([
                'status_message' => [
                    'label' => 'Status Message',
                    'rules' => 'required|min_length[3]|max_length[30]',
                    "errors" => [
                        'required' => 'The {field} is required when banning a user.',
                        'min_length' => 'The {field} must be at least {param} characters long.',
                        'max_length' => 'The {field} cannot exceed {param} characters in length.',
                    ]
                ]
            ])) {
                // Make sure a status message is provided
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $status_message = $this->request->getPost('status_message');// Get submitted message
            $user->ban($status_message);// Ban user with message
            // Redirect to user list with success message
            return redirect()->to('admin/users')->with('success', 'User has been banned');

        } elseif ($status === 'active') {
            // Unban user
            $user->unban();
        }

        // TODO: Check to activate user
        $active = $this->request->getPost('active');
        
        if ($active) {
            $user->activate();
            //Remove the forced activation screen identity
            $identityModel = model(UserIdentityModel::class);
            $identityModel->deleteIdentitiesByType($user, 'email_activate');
        } else {
            // Prevent admin from deactivating their own account
            if( $user->id === auth()->id()){
                return redirect()->to('admin/users')->with('error', 'You cannot deactivate your own account. What!? Lol.');
            }
            $user->deactivate();
        }

        // Validate input
        // TODO: Improve validation rules and error messages
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)?$/]|is_unique[users.username,id,'.$user->id.']',
                "errors" => [
                    'regex_match' => 'The {field} field can only contain alphanumeric characters and one(1) period.',
                    'is_unique'=> 'The {field} is already taken by another user. You must pick a unique unsername.',
                ],
            ],
            'email' => 'required|valid_email',
            'groups' => 'required',
        ];

        // Add password validation if password is provided
        if ($this->request->getPost('password')) {
            $rules['password'] = 'required|strong_password';
            $rules['password_confirm'] = 'required|matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update user
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        // Add password if provided
        if ($this->request->getPost('password')) {
            $userData['password'] = $this->request->getPost('password');
        }

        $user->fill($userData);

        // Save user
        $userProvider->save($user);

        // Update user groups
        // First remove all existing groups
        foreach ($user->getGroups() as $group) {
            $user->removeGroup($group);
        }
        
        // Then add the selected groups
        $groups = $this->request->getPost('groups');
        if (is_array($groups)) {
            foreach ($groups as $group) {
                $user->addGroup($group);
            }
        }

        return redirect()->to('admin/users')->with('success', 'User updated successfully.');
    }
    
    /**
     * Soft delete User if Admin permission
     * @param mixed $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete($id = null){
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->to('admin/users')->with('error', 'User not found.');
        }
        // Prevent admin from deleting their own account
        if( $user->id === auth()->id()){
            return redirect()->to('admin/users')->with('error', 'You cannot delete your own account.');
        }
        // If User exists, delete them
        if($user){
            $this->userModel->delete($id, true);
            return redirect()->to('admin/users')->with('success', 'User deleted successfully.');
        }else{
            return redirect()->to('admin/users')->with('error', 'User could not be deleted.');
        }
    }

    /**
     * Activate a User Account
     * 
     * @param mixed $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function activate($id = null){
        // Get user
        $user = $this->userModel->find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->to('admin/users')->with('error', 'User not found.');
        }

        // Activate user
        $user->activate();
        //Remove the forced activation screen identity
        $identityModel = model(UserIdentityModel::class);
        $identityModel->deleteIdentitiesByType($user, 'email_activate');

        return redirect()->to('admin/users')->with('success', 'User has been activated.');
    }
}
