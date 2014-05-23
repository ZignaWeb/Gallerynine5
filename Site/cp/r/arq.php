<?

// arquitectura

/*
# p 		: nivel de permiso
# a			: acciones posibles
# t 		: texto a mostrar en pantallla
# db		: correspondencia en la base de datos
# type 		: tipo de elemento en formulario - drop / input / textarea / select
# menu		: como mostrar - menu principal (top) / menu contextual (context)
# get   	: espera un id que corresponde a la tabla definida por get
# val   	: tipo de valor ingresado - varchar / text / file / email / number / date / datetime
# force 	: campo obligatorio
# autofill 	: valor prederteminado
# hide		: mostrar en list o no - 0 (mostrar inline) / 1 (popup) / 2 (no mostrar)
# search	: define un campo como posible de buscar o no, not set = searchable - 1(si) / 0(no)
*/
$cpa = array (
	cpa => array (
		t => "Control Pannel",
		db=> "cpa",
		c => array (
			his => array (db => "his", menu => "menu", t => $inline["his"], p => 1),
			setup => array (db => "setup", menu => "menu", t => $inline["setup"], p => 99),
		)
	)
);
$secciones=array(
	ema => array (
		db => "newsletter",
		t => "Emails",
		a => array (
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 1),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 1),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 1),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 1),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 1)
		),
		c => array (
			email => array( db => "email", t => $inline["Email"], type => "input", val => "varchar", force => 1, search => 1),
			agregado => array( db => "agregado", t => $inline["created"], type => "input", val => "datetime", force => 1, search => 1, autofill=>$ahora),
		)
	),
	med => array (
		db => "media",
		t => "Media",
		a => array (
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 1),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 1),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 1),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 1),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 1)
		),
		c => array (
			titulo => array( db => "titulo", t => $inline["title"], type => "input", val => "varchar", force => 1, search => 1),
			descripcion => array (db => "descripcion", t => $inline["desc"], type => "textarea", val => "text", search => 1),
			creada => array (db => "creada", t => $inline["created"], type => "input", val => "datetime", force => 1, search => 1, hide=>2, autofill=>$ahora),
			url => array (db => "url", t => $inline["File"], type => "img", val => "file", force => 1, search => 0), 
			dep_table => array (db => "dep_table", t => $inline["uploadto"], type => "input", val => "varchar", force => 1, search => 1, hide=>2), 
			dep_id => array (db => "dep_id", t => $inline["asignto"], type => "input", val => "number", force => 1, search => 1, hide=>2), 
			type => array (db => "type", t => $inline["type"], type => "input", val => "varchar", search => 1, hide => 2),
			mostrar => array ( db => "mostrar", t => $inline["visibility"], type => "select", 
					  options => array (1 => $inline["Show"], 0 => $inline["NoShow"],2 => $inline["private"])
					)
		)
	),
	sld => array (
		db => "sld",
		t => "Slider",
		a => array (
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 1),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 1),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 1),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 1),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 1)
		),
		c => array (
			titulo => array( db => "titulo", t => $inline["title"], type => "input", val => "varchar", force => 1, search => 1),
			creada => array (db => "creada", t => $inline["created"], type => "input", val => "datetime", force => 1, search => 1, hide=>2, autofill=>$ahora),
			mostrar => array ( db => "mostrar", t => $inline["visibility"], val => "number", type => "select", 
					  options => array (1 => $inline["Show"], 0 => $inline["NoShow"],2 => $inline["private"])
					),
			img => array ( db => "imagen", t => $inline["File"], type => "img", dependency=>"med", val => "file", search => 0, hide => 2,
					imgsizes => array (
						thumb => array ( w => "auto", h => 200),					
						slide => array ( w => 870, h => 450),
						slideh => array ( w => 1200, h => "auto")
					)
				)
		)
	),
	art => array (
		db => "artists",
		t => "Artists",
		
		a => array ( 
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 1),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 1),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 1),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 1),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 1),
			medias => array ( db => "medias", menu => "context", t =>$inline["medias"], p => 2),
			),
			
		c => array(
			nombre => array ( db => "nombre", t => $inline["nombre"], type => "input", val => "varchar", force => 1, search => 1),
			descripcion => array (  db => "descripcion", t => $inline["desc"], type => "textarea", val => "text", hide => 1, search => 1),
			links => array (  db => "links", t => $inline["links"], type => "textarea", val => "text", hide => 1, search => 1),
			cover => array ( db => "cover", t => $inline["cover"], type => "input", val => "number", hide => 2),
			img => array ( db => "imagen", t => $inline["File"], type => "img", dependency=>"med", val => "file", search => 0, hide => 2,
					imgsizes => array (
						thumb => array ( w => 500, h => 500),
						thumbcuad => array ( w => "auto", h => 200),
						cuad => array ( w => 200, h => 200),
						box   => array ( w => 900, h => "auto"),
					)
				),
			fecha => array (  db => "fecha", t => $inline["Date"], type => "input", val => "datetime", hide => 2, search => 1, autofill => $ahora),
			mostrar => array ( db => "mostrar", t => $inline["visibility"], type => "select", 
							  options => array (1 => $inline["Show"], 0 => $inline["NoShow"],2 => $inline["private"])
							)
		)
	),
	exi => array (
		db => "exhibits",
		t => "Exhibitions",
		
		a => array ( 
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 1),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 1),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 1),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 1),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 1),
			medias => array ( db => "medias", menu => "context", t =>$inline["medias"], p => 2),
			),
			
		c => array(
			titulo => array ( db => "titulo", t => $inline["nombre"], type => "input", val => "varchar", force => 1),
			artist => array ( db => "artista", t => "Artist", type => "drop", val => "number", get=> "art", force => 1),
			descripcion => array (  db => "descripcion", t => $inline["desc"], type => "textarea", val => "text", hide => 1),
			desde => array (  db => "desde", t => $inline["desde"], type => "input", val => "date", force => 1),
			hasta => array (  db => "hasta", t => $inline["hasta"], type => "input", val => "date", force => 1),
			opening => array (  db => "opening", t => "Opening Reception: ", type => "input", val => "varchar", force => 0),
			links => array (  db => "links", t => $inline["links"], type => "textarea", val => "text", hide => 1, search => 0),
			cover => array ( db => "cover", t => $inline["cover"], type => "input", val => "number", hide => 2),
			img => array ( db => "imagen", t => $inline["File"], type => "img", dependency=>"med", val => "file", hide => 2, search => 0,
					imgsizes => array (
						thumb => array ( w => 420, h => 280),
						slide => array ( w => 870, h => 450),
						box   => array ( w => 900, h => "auto"),
						landscape   => array ( w => 195, h => 100),						
					)
				),
			fecha => array (  db => "fecha", t => $inline["Date"], type => "input", val => "datetime", hide => 2, search => 1, autofill => $ahora),
			mostrar => array ( db => "mostrar", t => $inline["visibility"], type => "select", 
							  options => array (1 => $inline["Show"], 0 => $inline["NoShow"])
							)
		)
	),
	/*NEWS*/
	news => array (
		db => "news",
		t => "News",
		a => array (
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 1),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 1),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 1),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 1),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 1),
			medias => array ( db => "medias", menu => "context", t =>$inline["medias"], p => 2)
		),
		c => array (
			titulo => array( db => "titulo", t => $inline["title"], type => "input", val => "varchar", force => 1, search => 1),
			descripcion => array (db => "descripcion", t => $inline["desc"], type => "textarea", force =>1, val => "text", hide => 1, search => 1),
			creada => array (db => "creada", t => $inline["created"], type => "input", val => "datetime", force => 1, search => 1, hide=>1, autofill=>$ahora),
			img => array ( db => "url", t => $inline["File"], type => "img", dependency=>"med", val => "file", hide => 2, search => 0,
					imgsizes => array (
						thumb => array ( w => 200, h => 200),
						box   => array ( w => 900, h => "auto"),
					)
				),
		)
	),
	/*NEWS*/
	
	// required
	his => array (
		db=> "historial",
		t => "History",
		a => array ( 
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 2),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 99),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 99),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 99),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 2)
			),
		c => array(
			quien => array ( db => "quien", t => $inline["nombre"], type => "drop", val => "number", get => "adm", search => 1),
			accion => array ( db => "accion", t => $inline["Accion"], type => "input", val => "varchar", search => 1),
			codigo => array ( db => "codigo", t => $inline["Codigo"], type => "textarea", val => "codigo", hide => 1),
			fechahora  => array ( db => "fechahora", t => $inline["Datetime"], type => "input", val => "datetime", search => 1)
		)
	),
	adm => array (
		db => "admins",
		t => "Admins",
		a => array ( 
			listar => array ( db => "listar", menu => "menu", t =>$inline["listar"], p => 99),
			editar => array ( db => "editar", menu => "context", t =>$inline["editar"], p => 99),
			delete => array ( db => "delete", menu => "context", t =>$inline["delete"], p => 99),
			cargar => array ( db => "cargar", menu => "menu", t =>$inline["cargar"], p => 99),
			export => array ( db => "export", menu => "menu", t =>$inline["export"], p => 99)
			),
		// 	usr	psw	email	level
		c => array (
			usr => array ( db => "usr", t => $inline["Username"], type => "input", val => "varchar", force => "1"),
			psw => array ( db => "psw", t => $inline["Password"], type => "password", val => "varchar", force => "1", search => 0),
			email => array ( db => "email", t => $inline["Email"], type => "input", val => "email"),
			level => array ( db => "level", t => $inline["Level"], type => "select", val => "number", force => "1", 	
					options => array (3 => "Admin")
				  )
		)
	)
	
	
);
?>