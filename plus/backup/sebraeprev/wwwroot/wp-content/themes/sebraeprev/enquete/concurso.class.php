<?php

require_once 'crud.class.php';

class concurso extends crud {

	protected $id_enquete;

	public function setIdEnquete( $id_enquete )
	{
		$this->id_enquete = $id_enquete;
	}

	public function getEnquete()
	{
		parent::setTabela( 'sebraeprev_enquete' );
		$enquete = parent::select( array( "*" ), "WHERE id = $this->id_enquete", "ASC", true );
		return $enquete;
	}

	public function getOpcoes()
	{
		parent::setTabela( 'sebraeprev_enquete_opcoes' );
		$opcoes = parent::select( array( "id, titulo" ), "WHERE id_enquete = $this->id_enquete" );
		return $opcoes;
	}

	public function registraVoto( array $voto )
	{
		parent::setTabela( 'sebraeprev_enquete_votos' );
		$resultado = parent::insert( $voto );
		return $resultado;
	}

	public function getVotos()
	{
		parent::setTabela( 'sebraeprev_enquete_votos' );
		parent::setTabelaJoin( 'sebraeprev_enquete_opcoes' );
		$resultado = parent::selectCount( "id_opcao", "WHERE tb1.id_enquete = $this->id_enquete", "tb1.id_opcao", "total DESC" );
		return $resultado;
	}

	public function registraOpcao( array $opcoes )
	{
		parent::setTabela( 'sebraeprev_enquete_opcoes' );
		$this->deleteOpcao();
		foreach( $opcoes as $opcao ) {
			parent::sanitize( $opcao );
			$resultado = parent::insert( array('titulo' => $opcao, 'id_enquete' => $this->id_enquete) );
		}
		return $resultado;
	}

	public function deleteOpcao()
	{
		parent::setTabela( 'sebraeprev_enquete_opcoes' );
		$resultado = parent::delete( "id_enquete = '$this->id_enquete'" );
		return $resultado;
	}

}