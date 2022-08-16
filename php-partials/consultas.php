<?php 
	function campus($campus){
	if($campus==1) return "Mexicali";
	if($campus==2) return "Tijuana";
	if($campus==3) return "Ensenada";
	return "";
}

function facultad($campus,$code){
	if($campus==1){
		if($code=="1") return "FACULTAD DE ARQUITECTURA Y DISEÑO";
		if($code=="10") return "INSTITUTO DE CIENCIAS AGRÍCOLAS";
		if($code=="40") return "FACULTAD DE CIENCIAS HUMANAS";
		if($code=="80") return "FACULTAD DE CIENCIAS SOCIALES Y POLÍTICAS";
		if($code=="90") return "FACULTAD DE CIENCIAS ADMINISTRATIVAS";
		if($code=="110") return "FACULTAD DE DERECHO";
		if($code=="111") return "INSTITUTO DE INGENIERÍA";
		if($code=="123") return "FACULTAD DE DEPORTES";
		if($code=="124") return "FACULTAD DE ARTES";
		if($code=="140") return "FACULTAD DE INGENIERÍA";
		if($code=="160") return "FACULTAD DE MEDICINA";
		if($code=="200") return "INSTITUTO DE INVESTIGACIONES EN CIENCIAS VETERINARIAS";
		if($code=="220") return "FACULTAD DE ODONTOLOGÍA";
		if($code=="260") return "FACULTAD DE PEDAGOGÍA E INNOVACIÓN EDUCATIVA";
		if($code=="300") return "FACULTAD DE ENFERMERÍA";
		if($code=="310") return "FACULTAD DE IDIOMAS";
		if($code=="335") return "UNIDAD CIENCIAS DE LA SALUD";
		if($code=="605") return "INSTITUTO DE INVESTIGACIONES SOCIALES";
		if($code=="625") return "INSTITUTO DE INVESTIGACIONES CULTURALES-MUSEO";
		if($code=="2") return "FACULTAD DE INGENIERÍA Y NEGOCIOS - GUADALUPE VICTORIA";
		if($code=="125") return "FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN CIUDAD MORELOS)";
		if($code=="126") return "FACULTAD DE CIENCIAS ADMINISTRATIVAS (EXTENSIÓN SAN FELIPE)";
		if($code=="150")return "FACULTAD DE DEPORTES";
		return "Error en campus Mexicali";
	}else if($campus==2){
		if($code=="70") return "FACULTAD DE CIENCIAS QUÍMICAS E INGENIERÍA";
		if($code=="100") return "FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN";
		if($code=="120") return "FACULTAD DE DERECHO";
		if($code=="130") return "FACULTAD DE ECONOMÍA Y RELACIONES INTERNACIONALES";
		if($code=="150") return "FACULTAD DE DEPORTES";
		if($code=="180") return "FACULTAD DE MEDICINA Y PSICOLOGÍA";
		if($code=="500") return ">UNIDAD UNIVERSITARIA EN ROSARITO";
		if($code=="190") return "FACULTAD DE ARTES";
		if($code=="240") return "FACULTAD DE ODONTOLOGÍA";
		if($code=="280") return "FACULTAD DE TURISMO Y MERCADOTECNIA";
		if($code=="311") return "FACULTAD DE IDIOMAS";
		if($code=="313") return "FACULTAD DE IDIOMAS (EXTENSIÓN TECATE)";
		if($code=="626") return "INSTITUTO DE INVESTIGACIONES HISTÓRICAS";
		if($code=="790") return "FACULTAD DE HUMANIDADES Y CIENCIAS SOCIALES";
		if($code=="400") return "FACULTAD DE CIENCIAS DE LA INGENIERÍA, ADMINISTRATIVAS Y SOCIALES";
		if($code=="332") return "FACULTAD DE CIENCIAS DE LA INGENIERÍA Y TECNOLOGÍA";
		if($code=="334") return "FACULTAD DE CIENCIAS DE LA SALUD";
		return "error campus Tijuana";
	}else if($campus==3){
		if($code=="20") return "FACULTAD DE ARTES";
		if($code=="30") return "FACULTAD DE CIENCIAS";
		if($code=="50") return "FACULTAD DE CIENCIAS MARINAS";
		if($code=="170") return "FACULTAD DE DEPORTES";
		if($code=="290") return "FACULTAD DE INGENIERÍA, ARQUITECTURA Y DISEÑO";
		if($code=="312") return "FACULTAD DE IDIOMAS";
		if($code=="320") return "ESCUELA DE CIENCIAS DE LA SALUD";
		if($code=="330") return "FACULTAD DE ENOLOGÍA Y GASTRONOMÍA";
		if($code=="615") return "INSTITUTO DE INVESTIGACIÓN Y DESARROLLO EDUCATIVO";
		if($code=="620") return "INSTITUTO DE INVESTIGACIONES OCEANOLÓGICAS";
		if($code=="795") return "FACULTAD DE CIENCIAS ADMINISTRATIVAS Y SOCIALES";
		if($code=="700") return "FACULTAD DE INGENIERÍA Y NEGOCIOS - SAN QUINTÍN";
		return "Error campus Enenada";
	}
	return "No se encontro el campus";
}

function estadoSolicitudTemporal($valor){
	if($valor==1) return "Revisión pendiente";
	if($valor==2) return "Rechazado";
	return "DESCONOCIDO";
}

function tipoMovilidadAcademico($valor){
	//1-Docencia; 2-Estancias Sabáticas; 3-Estancia de Investigación
	if($valor==1) return "Docencia";
	if($valor==2) return "Estancias sabáticas";
	if($valor==3) return "Estancia de investigación";
	return "No especificada";
}

function nivel($niv){
	if($niv==1) return "Licenciatura";
	if($niv==2) return "Especialidad";
	if($niv==3) return "Maestría";
	if($niv==4) return "Doctorado";
	return "Desconocido";
}

function sexo($value){
	if($value==1) return "Masculino";
	if($value==2) return "Femenino";
	return "Otro";
}
?>