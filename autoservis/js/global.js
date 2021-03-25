function ukloniNew(delid, modul, msg) {
	if(confirm(msg)){
		window.location.href='moduli/' + modul + '.php?del_id='+delid+'';
		return true;
	}
}
