<?php
namespace model;

class User
{
	private $id;
	private $name;
	private $email;
	private $password;

	function __construct($id, $name, $email, $password)
	{
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		

	}


// GETTERS

	public function getId()
	{
		return $this->id;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getName()
	{
		return $this->name;
	}

// SETTERS
	
	public function setId($id)
	{
		$this->id=$id;
	}

	public function setEmail($email)
	{
		$this->email=$email;
	}

	public function setPassword($password)
	{
		$this->password=$password;
	}

	public function setName($name)
	{
		$this->name=$name;
	}

}
?>