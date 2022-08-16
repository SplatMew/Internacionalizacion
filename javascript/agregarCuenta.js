function createFormProfile(){
    var select = document.getElementById("tipeForm").value;
    var titulo = document.getElementById("formTitle");

    if(select=="1"){
        //estudiante de la uabc
        titulo.innerHTML=`<h5 class="text-center mt-4 fw-bold" id="title">Formulario crear cuenta para estudiante de la UABC</h5>
                <hr class="ms-5 me-5 ps-5 pe-5" />`;
        document.getElementById("formSeleted").style.display = 'inline';
        document.getElementById("datosTitulo").innerHTML=`Datos del estudiante`;
        document.getElementById("actionForm").action="php-partials/new_profile_ES.php";
        document.getElementById("btnExportar").innerHTML=`Crear cuenta estudiante de UABC`;
        
;    }else if(select=="2"){
        //alumno visitante
        titulo.innerHTML=`<h5 class="text-centerr mt-4 fw-bold" id="title">Formulario crear cuenta para estudiante que visita UABC</h5>
                <hr class="ms-5 me-5 ps-5 pe-5" />`;
        document.getElementById("formSeleted").style.display = 'inline';
        document.getElementById("datosTitulo").innerHTML=`Datos del estudiante`;
        document.getElementById("actionForm").action="php-partials/new_profile_EE.php";
        document.getElementById("btnExportar").innerHTML=`Crear cuenta estudiante visitante`;
    }else if(select=="3"){
        //académico de la uabc
        titulo.innerHTML=`<h5 class="text-centerr mt-4 fw-bold" id="title">Formulario crear cuenta para académico de la UABC</h5>
                <hr class="ms-5 me-5 ps-5 pe-5" />`;
        document.getElementById("formSeleted").style.display = 'inline';
        document.getElementById("datosTitulo").innerHTML=`Datos del académico`;
        document.getElementById("actionForm").action="php-partials/new_profile_AS.php";
        document.getElementById("btnExportar").innerHTML=`Crear cuenta académico de UABC`;
    }else if(select=="4"){
        //académico visitante
        titulo.innerHTML=`<h5 class="text-centerr mt-4 fw-bold" id="title">Formulario crear cuenta para académico que visita  UABC</h5>
                <hr class="ms-5 me-5 ps-5 pe-5" />`;
        document.getElementById("formSeleted").style.display = 'inline';
        document.getElementById("datosTitulo").innerHTML=`Datos del académico`;
        document.getElementById("actionForm").action="php-partials/new_profile_AE.php";
        document.getElementById("btnExportar").innerHTML=`Crear cuenta académico visitante`;
    }else {
        titulo.innerHTML=``;
        document.getElementById("formSeleted").style.display = 'none';
        document.getElementById("actionForm").action="";
    }
}


function comparePasswords(idpass,idConfirm){
    var pass = document.getElementById(idpass).value;
    var passConfirm = document.getElementById(idConfirm).value;
    if(pass !== passConfirm){
        document.getElementById(idConfirm).value="";
        alert("Las contraseñas no coinciden");
    }
}

function facultades(form){
    var campus; 
    var facultades;
    if(form==7){
        campus = document.getElementById("campus_clave").value;
        facultades = document.getElementById("unidad_clave");
    }else if(form==8){
        campus = document.getElementById("campusemisor").value;
        facultades = document.getElementById("unidademisora");
    }
    
    if(campus==1){
        facultades.innerHTML=`
        <option value=''>-Seleccione una opción-</option>
        <option value='1'>FACULTAD DE ARQUITECTURA Y DISEÑO</option>
        <option value='10'>INSTITUTO DE CIENCIAS AGRÍCOLAS</option> 
        <option value='40'>FACULTAD DE CIENCIAS HUMANAS</option>
        <option value='80'>FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS</option>
        <option value='90'>FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
        <option value="110">FACULTAD DE DERECHO</option>
        <option value='111'>INSTITUTO DE INGENIERÍA</option>
        <option value="123">FACULTAD DE DEPORTES</option>
        <option value='124'>FACULTAD DE ARTES</option>
        <option value="140">FACULTAD DE INGENIERÍA</option>
        <option value="160">FACULTAD DE MEDICINA</option>
        <!--<option value='165'>CENTRO DE EDUCACIÓN ABIERTA Y A DISTANCIA</option>-->
        <option value='200'>INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS</option>
        <option value='220'>FACULTAD DE ODONTOLOGÍA
            <!--MEXICALI-->
        </option>
        <option value='260'>FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>
        <option value='300'>FACULTAD DE ENFERMERÍA</option>
        <option value='310'>FACULTAD DE IDIOMAS</option>
        <option value='335'>UNIDAD CIENCIAS DE LA SALUD
            <!--MEXICALI-->
        </option>
        <!--<option value='600'>DIRECCIÓN GENERAL DE ASUNTOS ACADÉMICOS</option>-->
        <option value='605'>INSTITUTO DE INVESTIGACIONES SOCIALES</option>
        <option value='625'>INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO</option>
        <option value='2'>FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA</option>
        <option value='125'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)
            <!--TRONCOS COMUNES (CIUDAD MORELOS)-->
        </option>
        <option value='126'>FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)
            <!--TRONCOS COMUNES (SAN FELIPE)-->
        </option>
        `;
    }else if(campus == 2){
        facultades.innerHTML=`
        <option value=''>-Seleccione una opción-</option>
        <option value='70'>FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA</option>
        <option value='100'>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</option>
        <option value='120'>FACULTAD DE DERECHO</option>
        <option value='130'>FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES</option>
        <option value='150'>FACULTAD DE DEPORTES
            <!-- EXTENSION CAMPUS TIJUANA -->
        </option>
        <option value='180'>FACULTAD DE MEDICINA Y PSICOLOGÍA</option>
        <option value='500'>UNIDAD UNIVERSITARIA EN ROSARITO
            <!-- TRONCOS COMUNES (ROSARITO) -->
        </option>
        <option value='190'>FACULTAD DE ARTES</option>
        <option value="240">FACULTAD DE ODONTOLOGÍA</option>
        <option value='280'>FACULTAD DE TURISMO Y MERCADOTECNIA</option>
        <option value="311">FACULTAD DE IDIOMAS</option>
        <option value="313">FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)</option>
        <!--<option value="333">FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA</option>-->
        <!--<option value="336">CENTRO UNIVERSITARIO DE EDUCACIÓN EN SALUD</option>-->
        <option value='626'>INSTITUTO DE INVESTIGACIONES HISTÓRICAS</option>
        <option value='790'>FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES</option>
        <option value='400'>FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES</option>
        <option value='332'>FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA
            <!--VALLE DE LAS PALMAS-->
        </option>
        <option value='334'>FACULTAD DE CIENCIAS DE LA SALUD
            <!--VALLE DE LAS PALMAS-->
        </option>
        `;
    }else if(campus == 3){
        facultades.innerHTML=`
        <option value=''>-Seleccione una opción-</option>
        <option value='20'>FACULTAD DE ARTES</option>
        <option value='30'>FACULTAD DE CIENCIAS</option>
        <option value="50">FACULTAD DE CIENCIAS MARINAS</option>
        <option value='170'>FACULTAD DE DEPORTES</option>
        <option value='290'>FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO</option>
        <option value='312'>FACULTAD DE IDIOMAS</option>
        <option value='320'>ESCUELA DE CIENCIAS DE LA SALUD</option>
        <option value="330">FACULTAD DE ENOLOGÍA Y GASTRONOMÍA</option>
        <!--<option value='331'>FACULTAD DE ARQUITECTURA Y DISEÑO ENSENADA</option>-->
        <option value="615">INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO</option>
        <option value="620">INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS</option>
        <option value='795'>FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
        <!--<option value='801'>ESCUELA DE ENFERMERÍA MIGUEL SERVET</option>-->
        <option value='700'>FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN</option>
        `;
    }else {
        facultades.innerHTML=`<option value="">-- Seleccione primero un campus --</option>`;
    }
}