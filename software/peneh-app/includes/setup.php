<?php

if (isset($_POST['login-submit'])){
    
        $host = $_POST['host'];
        $name = $_POST['name'];
        $user = $_POST['username'];
        $password = $_POST['password'];
        $port = $_POST['password'];
        $file_name = 'includes/12db.php';
       
    //write file
    if(file_put_contents($file_name, "<?php /$dsn = 'mysql: host=$host; dbname=$name; port=$port'; $opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];/$db_user = ' /$user';/$db_password = '$password';$db = new PDO($dsn, $db_user, $db_password, $opt);?>")!==false){
        echo 'file created';
    }else{
        echo 'can not write file';
    }

}
?>
<head>
        <meta charset="UTF-8">
        <title>The Peneh App</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
</head>
    
<div class="container">
    	    <div class="row">
			    <div class="col-md-6 col-md-offset-3">
				    <div class="panel panel-login">
					    <div class="panel-body">
						    <div class="row">
							    <div class="col-lg-12">
                                <p>We need your database info to get stared</p>
								    <form id="login-form"  method="post" role="form" style="display: block;">
									    <div class="form-group">
										    <input type="text" name="host" id="host" tabindex="1" class="form-control" placeholder="DATABASE Host Address" required>
									    </div>
                                        
									    <div class="form-group">
										    <input type="text" name="name" id="login-
										password" tabindex="2" class="form-control" placeholder="DATABASE Name" required>
                                        </div>
                                        
                                         <div class="form-group">
										    <input type="text" name="username" id="login-
										password" tabindex="2" class="form-control" placeholder="DATABASE Username" required>
                                        </div>
                                        
                                         <div class="form-group">
										    <input type="text" name="password" id="login-
										password" tabindex="2" class="form-control" placeholder="DATABASE Password" required>
                                        </div>
                                        
                                          <div class="form-group">
										    <input type="text" name="port" id="login-
										password" tabindex="2" class="form-control" placeholder="Port" required>
                                        </div>
                                      
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-custom" value="Install Peneh App">
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
