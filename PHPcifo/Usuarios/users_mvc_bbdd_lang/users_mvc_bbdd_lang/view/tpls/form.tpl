<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- <title></title> -->
    <title>{{::title::}}</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        h2{font-family: 'Roboto', sans-serif}
    .error{border:2px solid red!important;}

    </style>
</head>
    <body class="container-fluid">
             <header class="mx-2">
                  <nav class="navbar navbar-light bg-light justify-content-between">
                        <h3><a class="navbar-brand">{{::logo::}}</a></h3>
                        <form class="form-inline my-2 mx-2" method="GET">
                              <label class="mr-sm-2" for="inlineFormCustomSelectPref">{{::cambiar_idioma::}}</label>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="lang">
                                    <option selected>{{::opcion1::}}</option>
                                    <option value="cast">{{::opcion2::}}</option>
                                    <option value="cat">{{::opcion3::}}</option>
                              </select>
                              <button type="submit" class="btn btn-primary">{{::cambiar::}}</button>
                        </form>
                  </nav>
            </header>
        <div class="container mx-5 my-3">
		<form method="post" class="mb-3" action="../controller/app.php">
			{{::label_usuario::}}: <br><input type="text" class="{{::class_error::}}" name="usuario" value="{{::usuario::}}" /><br><br>
			{{::label_email::}}: <br><input type="text" class="{{::class_error::}}" name="email" value="{{::email::}}" /><br><br>
      {{::label_pwd::}}<br><input type="password" id='pwd' name="pwd" class="{{::class_error::}}" value="{{::password::}}"></br>
      <span id="pwdPlace" class="pwdPlace">{{::click::}}</span> <br>
			<input type="hidden" name="action" value="NuevoUsuario">
			<input type="submit" class="btn btn-primary" name="registrar" value="{{::enviar::}}" /><br>
			{{::mensaje_error::}}
			
		</form>
        <a href="?lang=cat">Català</a> || <a href="?lang=cast">Castellano</a>
        </div>
        <script>
          const pwd = document.querySelector('#pwd');
          const pwdHelp = document.querySelector('#pwdPlace');
          document.addEventListener('DOMContentLoaded', ()=>{
            const limpiaPwd = () => {
              if(pwd.value === '{{::password::}}'){
                pwd.value='';
                pwdHelp.style.display = 'inline';
              }
            };
            pwd.addEventListener('click', limpiaPwd);
            pwd.addEventListener('change', ()=>{
              pwdHelp.style.display='none';
            });
          });
        </script>
		
	</body>
	</html>