<form class="form-signin" action="/login" method="POST">
    <h2 class="form-signin-heading"><?php echo __('Please sign in')?></h2>
    <input type="text" class="form-control" placeholder="<?php echo __('Email or username')?>" name="data[User][username]" value="<?php echo $this->request->data['User']['username'];?>" required autofocus>
    <input type="password" class="form-control" placeholder="<?php echo __('Password')?>" name="data[User][password]" value="<?php echo $this->request->data['User']['password'];?>" required>
    <label class="checkbox">
        <input type="checkbox" value="1" name="data[User][rememberMe]" <?php echo $this->request->data['User']['rememberMe'];?>> <?php echo __('Remember me')?>
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo __('Sign in')?></button>
    <h4><a href="/" ><?php echo __('Back to home')?></a></h4>
</form>