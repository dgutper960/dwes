<?php 

	class explorador { 
		
		private $dirRaiz;
		private $dirActual;
		

		public function __construct(
			$pRaiz=null, 
			$pActual=null
			)
		{
			$this->dirRaiz=$pRaiz;
			
			if (is_null($pActual)) {
				chdir($pRaiz);
			}
			else {
				chdir($pActual);
			}
			$this->dirActual=getcwd();
		} 
			
		// Retorna directorio raiz
		public function getDirRaiz(){
			return $this->dirRaiz;
		}

		// Retorna directorio actual
		public function getDirActual() {
			return $this->dirActual;
		}

		// establece directorio raiz
		public function setDirRaiz($pRaiz) {
			$this->dirRaiz=$pRaiz;
		}

		// establece directorio actual
		public function setDirActual($pActual) {
			$this->dirActual=$pActual;
		}

		// devuelve todo el contenido de esa carpeta
		public function leerDirectorioActual(){
			return glob('*');
		}

		// elimina archivo
		public function eliminarArchivo($archivo){
			unlink($archivo); // elimina el archivo
		}

		//Establece directorio actual
		public function establecerDirectorio(){
			if (is_dir($this->dirActual)){ // pregunta si es un dierctorio
					chdir($this->dirActual); // cambiamos al directorio
				}
		}

		//Método que recibe el array de check con los archivos y carpetas seleccionados.
		public function eliminar($lista) {
			foreach ($lista as $ad) {
			
				if (is_file($ad)) {
					$this->eliminarArchivo($ad);
				}
				if (is_dir($ad)) {
					$this->eliminarDirectorio($ad);
				}
			}

		}

		// Función Recursiva
		public function eliminarDirectorio($carpeta) {

			foreach(glob($carpeta . "/*") as $archivos_carpeta) {
        		
		        if (is_dir($archivos_carpeta))
		        {
		            $this->eliminarDirectorio($archivos_carpeta);
		        }
		        else
		        {
		            $this->eliminarArchivo($archivos_carpeta);
		        }
    		}
    	rmdir($carpeta);
		}
		
		// Subir Archivo al directorio actual DEBERÍA AÑADIRSE VALIDACIÓN
		public function subirArchivo($archivo){
			if (is_uploaded_file($archivo['tmp_name'])){
				move_uploaded_file($archivo['tmp_name'],$archivo['name']);
			}
		}
		//Descarga sólo el primer archivo seleccionado
		public function descargarArchivos($archivos){
			foreach ($archivos as $a) { // FALTAN EL RESTO DE DIRECTIVAS
				header("Content-type: application/octet-stream");
				header("Content-disposition: attachment; filename=".$a);
				readfile($a); 		
			}
		}

		public function comprimir($archivos){
			$zip = new ZipArchive();
			//El nombre del archivo comprimido como primer archivo seleccionado
			$archivoComprimido= "archivo.zip";
			// $archivoComprimido = array_shift(explode('.', basename($archivos[0]))).'.zip';
			if ($zip->open($archivoComprimido, ZIPARCHIVE::CREATE) === true) {
				foreach ($archivos as $archivo) {
					if (is_file($archivo)) {
						$zip->addFile($archivo, $archivo);
					}
					else{
						$this->agregarCarpeta($archivo, $zip);
					}
				}
				$zip->close();
			}
		}

		// Funcion para abrir carpetas USA RECURSIVIDAD
		function agregarCarpeta($carpeta, $zip) {
			$archivos = glob($carpeta . "/*");
			if (count($archivos)>0) {
				foreach ($archivos as $archivo) {
					if (is_dir($archivo)) {
						$this->agregarCarpeta($archivo, $zip);
					} 
					else{
						if (is_file($archivo)) {
							$zip->addFile($archivo, $archivo);
						}
					}
				}
			}
			else{
				$zip->addEmptyDir($carpeta);
			}
		}

	public function cambiarNombre($antiguoNombre, $nuevoNombre){
		rename($antiguoNombre, $nuevoNombre);
	}

	public function crearDirectorio($directorio){
		mkdir($directorio);
	}
	public function abrirDirectorio($directorio){
			if (is_dir($directorio)) {
				chdir($directorio);
				$this->dirActual=getcwd();
			}
			
		}

	public function cerrarDirectorio(){
		if (!(basename($this->dirActual)==$this->dirRaiz)){
			$this->dirActual=dirname($this->dirActual);
			chdir(dirname(getcwd()));
			}
	}

}

	
?>