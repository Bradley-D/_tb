<?php
/**
 * _tb custom functions
 *
 * @package _tb
 * @version 1.0
 */


/**
 * Footer credits
 * @since 1.0
 */
function _tb_ssm_credits() {
	_e( '<a title="_tb" href="https://github.com/Bradley-D/_tb">_tb</a>', '_tb' );
}
add_action( '_tb_credits', '_tb_ssm_credits' );
