            <div class="col-md-4 col-md-offset-4">
                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Halaman Login</h3>
                    </div>
                    <div class="panel-body">
                        <?php if ($this->session->flashdata('gagal_login') == TRUE) : ?>
                            <div class="text-center" style="color: red; margin-bottom: 30px;"><?php echo $this->session->flashdata('gagal_login'); ?></div>
                        <?php endif; ?>
                        <form role="form" method="post" action="<?php echo base_url('login')?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    <div style="color: red;"><?php echo form_error('username')?></div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                    <div style="color: red;"><?php echo form_error('password')?></div>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>