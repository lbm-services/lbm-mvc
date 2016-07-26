<?php include_once('Header.php'); ?>

<div class="container">
    <h2>Admin Area (User Management) </h2>
    <p><?php echo __FILE__;?></p>
    
    <!-- add user form -->
   <div class="box">
        <h3>Add User</h3>
        <?php include_once 'User_Form.php';?>
    </div>
    <!-- main content output -->    
    
        <div class="box">
        <h3>User</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Firstname</td>
                <td>LastName</td>
                <td>Login</td>
                <td>Email</td>
                <td>Passwordhash</td>
                <td>Role</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->users as $user) { ?>
                <tr>
                    <td><?php if (isset($user->id)) echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->firstname)) echo $user->firstname; ?></td>
                    <td><?php if (isset($user->lastname)) echo htmlspecialchars($user->lastname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->login)) echo htmlspecialchars($user->login, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->email)) echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->pass)) echo htmlspecialchars($user->pass, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($user->role)) echo htmlspecialchars($user->role, ENT_QUOTES, 'UTF-8'); ?></td>
                    
                        <?php if (isset($user->link)) { ?>
                            <td><a href="<?php echo htmlspecialchars($user->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($user->link, ENT_QUOTES, 'UTF-8'); ?></a></td>
                        <?php } ?>
                    
                    <td><a class="deleteLink" href="<?php echo URL . 'admin/deleteuser/' . htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'admin/edituser/' . htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once('Footer.php'); ?>