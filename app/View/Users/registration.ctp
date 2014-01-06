<div class="main-option">
    <h3><?php echo __('Pendaftaran Applicant') ?></h3>
        <?php
            echo $this->Form->create('User', array('class' => 'form-vertical', 'role' => 'form', 'id'=>'UserForgotPasswordForm', 'novalidate'));
        ?>
        <div class="form-group">
            <div class="col-lg-12">
                <?php
                echo $this->Form->input('hand_phone', array('label' => false,
                                                            'div' => false,
                                                            'required' => 'required',
                                                            'maxlength' => 20,
                                                            'size' => 20,
                                                            'class' => 'form-control',
                                                            'placeholder' => 'No handphone, contoh: 08113456789'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <?php
                echo $this->Form->input('email', array('label' => false,
                                                           'div' => false,
                                                           'maxlength' => 100,
                                                           'size' => 20,
                                                           'type' => 'email',
                                                           'class' => 'form-control',
                                                           'placeholder' => 'Email'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                 <?php
                    echo $this->Form->input('password', array('label' => false,
                                                               'div' => false,
                                                               'required' => 'required',
                                                               'maxlength' => 100,
                                                               'size' => 20,
                                                               'type' => 'password',
                                                               'class' => 'form-control',
                                                               'placeholder' => 'Sandi'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <?php
                    echo $this->Form->input('repass', array('label' => false,
                                                               'div' => false,
                                                               'required' => 'required',
                                                               'maxlength' => 100,
                                                               'size' => 20,
                                                               'type' => 'password',
                                                               'class' => 'form-control',
                                                               'placeholder' => 'Konfirmasi sandi'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <button type="submit" class="tbtn-accent full" id="btn_registration"><?php echo __('Daftar') ?></button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </form>

</div>

<div class="tlogin-help">
    <p><?php echo __('Sudah punya akun?') . ' <a href="/">'. __('Login') .'</a>' ?></p>
</div>
