<?
// acciones
$inline["listar"]="View";
$inline["editar"]="Edit";
$inline["delete"]="Delete";
$inline["cargar"]="Add";
$inline["export"]="Export";
$inline["medias"]="Upload";
$inline["download"]="Download file";
$inline["Search"]="Search";
$inline["pages"]="Pages";
$str["upfoto"]="Add media"; // boton post crear elemento

// headers
$inline["viendo"]="Listing: ";
$inline["permisos"]="Allowed actions";
$inline["eliminado"]="Deleted";
$inline["editado"]="Edited";
$inline["Bienvenido"]="Welcome";
$inline["login"]="Login";
$inline["logout"]="Logout";

// forms
$inline["searchTerm"]="Search term";
$inline["search"]="Search";
$inline["title"]="Title";
$inline["nombre"]="Name";
$inline["desc"]="Description";
$inline["tipo"]="File type";
$inline["created"]="Created";
$inline["File"]="File";
$inline["uploadto"]="Upload to";
$inline["asignto"]="Asign to";
$inline["Date"]="Date";
$inline["Datetime"]="Date and time";
$inline["Username"]="Username";
$inline["Password"]="Password";
$inline["Email"]="Email";
$inline["Level"]="Level";
$inline["Accion"]="Action";
$inline["Codigo"]="Code";
$inline["desde"]="From";
$inline["hasta"]="To";
$inline["sindefinir"]="Undefined";
$inline["Elegir"]="Choose: ";
$inline["type"]="File type";
$inline["visibility"]="Visibility";
$inline["Show"]="Show";
$inline["NoShow"]="Don't Show";
$inline["private"]="Private";
$inline["links"]="Links";
$inline["makecover"]="Cover";
$inline["Yes"]="Yes";
$inline["No"]="No";

// resultados busqueda
$inline["results"]="results";
$inline["buscando"]="searching for";
$inline["pagina"]="page";
$inline["of"]="of";
$inlint["noresults"]="There is no [:x:] to list at this moment.";

// menues
$inline["menu"]="Menu";
$inline["his"]="Log";
$inline["setup"]="Setup";
$inline["salir"]="Log-out";
$inline["goback"]="Go back";

// contexturales
$str["cargado"]="Element added to: "; 			// texto on seccess submit formulario cargar
$str["nocargado"]="Error creating: "; 	// texto on fail submit formulario cargar
$str["unamas"]="Add one more";
$str["crear"]="New: ";

// joyride
$str["joytext"]="Help";
$str["esotodo"]="That is it!";
$str["yacono"]="You know all the fundamental elements in this screen.";
$joy = array(
	array (
		i => "joy_menu_ver", // id del elemento html
		h => $inline["listar"], // titulo del tip
		t => "In this section you can see and manage all the registries added to the system." // texto del tip
	),
	array (
		i => "joy_menu_cargar",
		h => $inline["cargar"],
		t => "Here you have quick access for creating new material."
	),
	array (
		i => "joy_contenido_permisos",
		h => $inline["permisos"],
		t => "These are the thigs you are authorized to do."
	),
	array (
		i => "joy_menu_sec",
		h => "Secondary menu",
		t => "This is a list of the action that you can perform on this screen."
	),
	array (
		i => "joy_menu_sec_exportar",
		h => $inline["export"],
		t => "You can save the contents of this section into a spreadsheet (csv file)"
	),
	array (
		i => "filter-form",
		h => $inline["Search"],
		t => "Use this form to narrow the results and search for more specific entries."
	),
	array (
		i => "joy_context_actions",
		h => "Item contextual menu",
		t => "These are the actions that you can perform to manage entries in the system."
	),
	array (
		i => "joy_form_rtf",
		h => "Text editor",
		t => "Allows you to use rich text when writing content for the site. How to: select a segment of text and then click one of these buttons to add styles to it. This will add html code to the text saving you the time of doing it manually."
	)
);

// errores
$error["es"]["usrpsw"]="The login information you submited does not correspond to a valid user.";
$error["allobli"]="All fields are required.";
$error["oneobli"]="El campo <strong>[:x:]</strong> es obligatorio"; // [:x:] marca texto a reemplazar
$error["timeout"]="You sessions has expired, please login again.";
$error["tryagain"]="There was an error, please try again";
$error["notenoughpermits"]="You are not authorized to perform this action.";
// fiel upload
$error["wrongformat"]="File type not suported. Try uploading JPEG, JPG, GIF, PNG or PDF files.";
$error["copyfilefail"]="The file could not be tranfered.";

// editor de texto
$rtf["Titulo"]="Title";
$rtf["subTitulo"]="Sub Title";
$rtf["Italic"]="Italic";
$rtf["Clear"]="Clear tags";
$rtf["Bold"]="Bold";
$rtf["hyperlink"]="Link";
$rtf["hyperlinkTo"]="Where should it point to?";
$rtf["hyperlinkTxt"]="How should it read?";
$rtf["hyperlinkAdd"]="Add link";
$rtf["hyperlinkCancel"]="Cancel";

// tips
$inline["Tips"]="Tips";
$tipsCargar = array (
	"The fields marked with (*) are required.",
	"Due to server restrictions you cannot upload files larger than 2MB. As an alternative you can use the \"links\" field when adding or editing \"Artists\" or \"Exhibitions\" to display links to a remote source for these files (like issuu for pdfs)."
);
$tipsEditar = array (
	"The fields marked with (*) are required.",
	"Due to server restrictions you cannot upload files larger than 2MB. As an alternative you can use the \"links\" field when adding or editing \"Artists\" or \"Exhibitions\" to display links to a remote source for these files (like issuu for pdfs)."
);

// texto pagina setup
$info["setup"]="This section us intended to create all necesary elements in the database for this system to run properly.";
$info["dataconfigstatus"]="Database configuration";
$info["tablacreada"]="Table created";
$info["errorcreatetable"]="Error: the table could not be created";
$info["tablaexiste"]="Table [:x:] status: is in database.";

// texto pagina listar
$info["show"]="Show";
?>