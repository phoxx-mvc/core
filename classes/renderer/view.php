<?php

namespace Phoxx\Core\Renderer;

class View
{
	protected $template;

	protected $parameters = array();

	public function __construct(string $template, array $parameters = array())
	{
		$this->template = $template;
		$this->parameters = $parameters;
	}

	public function getTemplate(): string
	{
		return $this->template;
	}

	public function getParameter(string $name)
	{
		return isset($this->parameters[$name]) === true ? $this->parameters[$name] : null;
	}

	public function getParameters(): array
	{
		return $this->parameters;
	}

	public function setParameter(string $name, string $value): void
	{
		$this->parameters[$name] = $value;
	}
}