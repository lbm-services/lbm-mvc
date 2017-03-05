<?php
if (isset($this->user->id)) {
        $action = 'admin/updateuser' ;
        $submit = 'submit_update_user';
        $hidden = "<input type=\"hidden\" name=\"id\" value=\"".$this->user->id ."\"/>";
        $pass   = '';

} else {
    $action = 'admin/adduser';
    $submit = 'submit_add_user';
    $hidden = '';
    $pass   =   '<label>Password</label>
            <input type="password" name="password" value="" required />
            <p class="error"><small>'. (isset($this->error["password"]) ?  $this->error["password"] : ''). '</small></p>';

}
?>

<div class="box">
     <form action="<?php echo URL . '/' .   $action  ?>" method="POST">
            <label>Firstname</label>
            <input type="text" name="firstname" value="<?php echo (isset($this->user->firstname) ? htmlspecialchars($this->user->firstname, ENT_QUOTES, 'UTF-8') : ''); ?>" required />
            <p class="error"><small><?php echo (isset($this->error["firstname"]) ?  $this->error["firstname"] : ''); ?></small></p>
            <label>Lastname</label>
            <input type="text" name="lastname" value="<?php echo (isset($this->user->lastname) ? htmlspecialchars($this->user->lastname, ENT_QUOTES, 'UTF-8') : ''); ?>" required />
            <p class="error"><small><?php echo (isset($this->error["lastname"]) ?  $this->error["lastname"] : ''); ?></small></p>
            <label>Login</label>
            <input type="text" name="login" value="<?php echo (isset($this->user->login) ? htmlspecialchars($this->user->login, ENT_QUOTES, 'UTF-8') : '' ); ?>" required />
            <p class="error"><small><?php echo (isset($this->error["login"]) ?  $this->error["login"] : ''); ?></small></p>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo (isset($this->user->email) ? htmlspecialchars($this->user->email, ENT_QUOTES, 'UTF-8') : '' ); ?>" required />
            <p class="error"><small><?php echo (isset($this->error["email"]) ?  $this->error["email"] : ''); ?></small></p>
            <!-- Password not updateable -- @TODO: implement change Password Action -->
           <?=$pass?>
            <label>RoleId (1=Admin, 2=User, 3=Locked)</label>
            <input type="text" name="fk_role_id" value="<?php echo (isset($this->user->fk_role_id) ? htmlspecialchars($this->user->fk_role_id, ENT_QUOTES, 'UTF-8') : '' ) ; ?>" />
            <p class="error"><small><?php echo (isset($this->error["fk_role_id"]) ?  $this->error["fk_role_id"] : ''); ?></small></p>
            <?=$hidden?>
            <input type="submit" name="<?=$submit?>" value="Submit" />
        </form>
    </div>
