   

    <body>
        <div class="signin-container">
            <div class="photo-box">
                
            </div>
            <div class="login-box">
                <div class="first-box">
                    <div class="header-box">
                        <div class="header">
                            <?=$content['header']?>
                        </div>
                        <div class="text">
                            <?=$content['text']?>
                        </div>
                    </div>

                    <?=form_open($content['form']['action'], $content['form']['parameters']['class'])?>
                        <?= csrf_field() ?>
                        <?php if( $content['buttons']['signin'] && $content['buttons']['back'] ) : ?>
                                <div class="user-box">
                                    <!-- TUTAJ KOD DLA WELCOME BACK-->
                                    <div class="avatar-box">
                                        <div class="remove-user">x</div>
                                        <?= '<img class="avatar" src="'.base_url($user['avatar']).'">'?>
                                    </div>
                                    <div class="user">
                                        <span class="user-name"><?=$user['name'].' '.$user['surname']?></span>
                                        <span class="user-role"><?=$user['rolename']?></span>
                                    </div>
                                </div>
                                
                                <div class="input">
                                    <label for="password">Password<span class="mask"></label>
                                    <input type="password" name="password" required id="password" autocomplete="off">
                                    <span class="input-error">
                                        <?php if(isset($data['errors']['password'])){echo $data['$errors']['password'];}?>
                                    </span>
                                </div>
                            <?php else: ?>
                                <div class="input">
                                    <label for="email">E-mail<span class="mask"></span></label>
                                    
                                    <input type="email" name="email" id="email"  value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" required>
                                    <span class="input-error">
                                        <?php if(isset($data['errors']['email'])){echo $data['errors']['email'];}?>
                                    </span>
                                </div>
                                
                                <div class="input">
                                    <label for="password">Password<span class="mask"></label>
                                    <input type="password" name="password" required id="password" autocomplete="off">
                                    <span class="input-error">
                                        <?php if(isset($data['errors']['password'])){echo $data['errors']['password'];}?>
                                    </span>
                                </div>
                            <?php endif; ?> 
                        
                        
                        <!-- Patrz widok width == 400 dodaj klasy dla przycisków aby można było wystylizować "back" na taki mały jak w projekcie adobe XD -->
                        
                            <?php if( $content['buttons']['signin'] && $content['buttons']['back'] ) : ?>
                                <div class="submit splited">
                                    <a class="back-button" href="<?php echo base_url().'/back'; ?>">Back</a>
                                    <input type="submit" value="Sign in" class="signin-button">
                            <?php else: ?>
                                <div class="submit">
                                    <input type="submit" value="Sign in" class="signin-button">
                            <?php endif; ?> 
                        </div>
                    </form>
                </div>
                <div class="helpers-box">
                    <span class="text">Forgot password?<a href="">Reset password</a></span>
                    <span class="text">Don't have an account?<a href="">Sign up</a></span>
                </div>
            </div> 
        </div>
    </body>
</html>
