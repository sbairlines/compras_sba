<?php
function priv( $priv_search ) {
	if ( in_array( $priv_search, $_SESSION["usuario"]["privilegios"] ) ) {
		return true;
	} else {
		return false;
	}
}
?>