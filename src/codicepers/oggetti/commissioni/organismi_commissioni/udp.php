<?
if ($istanzaOggetto['immagine'] != '' and $istanzaOggetto['immagine'] != 'nessuno') {
	$posPunto = strrpos($istanzaOggetto['immagine'], ".");
	$estFile = strtolower(substr($istanzaOggetto['immagine'], ($posPunto +1)));

	if ($estFile == 'gif' or $estFile == 'jpg' or $estFile == 'jpeg' or $estFile == 'png' or $estFile == 'bmp') {
		// PUBBLICO UNA IMMAGINE
		echo "<div class=\"campoOggetto126\"><img alt=\"" . $istanzaOggetto['nome'] . "\" src=\"" . $base_url . "moduli/output_media.php?file=" . $documento->tabella . "/" . $istanzaOggetto['immagine'] . "&amp;qualita=75&amp;larghezza=120px\" /></div>";
	}
}	
echo "<h3 class=\"campoOggetto24\"><strong>".$istanzaOggetto['nome']."</strong></h3>";

echo '<div class="reset"></div>';

if($istanzaOggetto['indirizzo'] != '') {
	echo '<div class="">Indirizzo: '.$istanzaOggetto['indirizzo'].'</div>';
}
if($istanzaOggetto['email'] != '') {
	echo '<div class="campoOggetto77">Email: <a href="mailto:'.$istanzaOggetto['email'].'">'.$istanzaOggetto['email'].'</a></div>';
}
if($istanzaOggetto['telefono'] != '') {
	echo '<div class="">Telefono: '.$istanzaOggetto['telefono'].'</div>';
}
if($istanzaOggetto['fax'] != '') {
	echo '<div class="">Fax: '.$istanzaOggetto['fax'].'</div>';
}

if($istanzaOggetto['descrizione'] != '') {
	echo '<div class="">'.$istanzaOggetto['descrizione'].'</div>';
}

echo '<div class=""><h4 class="campoOggetto86">Membri</h4></div>';

if (trim($istanzaOggetto['presidente']) != '' and $istanzaOggetto['presidente'] != 0) {
	$idOggMulti = explode(',', $istanzaOggetto['presidente']);
	$outputScreen = '';
	foreach ((array)$idOggMulti as $idOggTmp) {
		$istOgg = mostraDatoOggetto($idOggTmp, 3, '*');
		if (trim($istOgg['id']) > 0) {
			$strAncora = $base_url . "index.php?id_oggetto=3&amp;id_cat=" . $istOgg['id_sezione'] . "&amp;id_doc=" . $idOggTmp;
			if ($outputScreen != '') {
				$outputScreen .= ', ';
			}
			$outputScreen .= '<a href="'.$strAncora.'">'.$istOgg['referente'].'</a>';
		}
	}
	echo '<div class=""> Presidente: '.$outputScreen.'</div>';
	unset ($outputScreen);
}

if (trim($istanzaOggetto['vicepresidente']) != '' and $istanzaOggetto['vicepresidente'] != 0) {
	$idOggMulti = explode(',', $istanzaOggetto['vicepresidente']);
	$outputScreen = '';
	foreach ((array)$idOggMulti as $idOggTmp) {
		$istOgg = mostraDatoOggetto($idOggTmp, 3, '*');
		if (trim($istOgg['id']) > 0) {
			$strAncora = $base_url . "index.php?id_oggetto=3&amp;id_cat=" . $istOgg['id_sezione'] . "&amp;id_doc=" . $idOggTmp;
			if ($outputScreen != '') {
				$outputScreen .= ', ';
			}
			$outputScreen .= '<a href="'.$strAncora.'">'.$istOgg['referente'].'</a>';
		}
	}
	echo '<div class=""> Vicepresidente: '.$outputScreen.'</div>';
	unset ($outputScreen);
}

if (trim($istanzaOggetto['segretari']) != '' and $istanzaOggetto['segretari'] != 0) {
	$idOggMulti = explode(',', $istanzaOggetto['segretari']);
	$outputScreen = '';
	foreach ((array)$idOggMulti as $idOggTmp) {
		$istOgg = mostraDatoOggetto($idOggTmp, 3, '*');
		if (trim($istOgg['id']) > 0) {
			$strAncora = $base_url . "index.php?id_oggetto=3&amp;id_cat=" . $istOgg['id_sezione'] . "&amp;id_doc=" . $idOggTmp;
			if ($outputScreen != '') {
				$outputScreen .= ', ';
			}
			$outputScreen .= '<a href="'.$strAncora.'">'.$istOgg['referente'].'</a>';
		}
	}
	echo '<div class=""> Segretario questore: '.$outputScreen.'</div>';
	unset ($outputScreen);
}


echo '<div class="reset"></div>';

visualizzaAllegatiDinamici($istanzaOggetto);

visualizzaDataAggiornamento($istanzaOggetto);

echo '<div class="reset"></div>';
?>