<?php

namespace Phoxx\Core\File;

use Phoxx\Core\File\FileExceptions\FileException;

class File
{
  protected $path;

  protected $name;

  protected $baseName;

  protected $directory;

  protected $extension;

  protected $mimetype;

  public function __construct(string $path)
  {
    if (is_file($path) === false) {
      throw new FileException('Invalid file `' . $path . '`.');
    }

    $pathInfo = pathinfo($this->path);

    $this->path = realpath($path);
    $this->name = $pathInfo['filename'];
    $this->baseName = $pathInfo['basename'];
    $this->directoryName = isset($pathInfo['dirname']) === true ? $pathInfo['dirname'] : null;
    $this->extension = isset($pathInfo['extension']) === true ? $pathInfo['extension'] : null;
    $this->mimetype = ($mimetype = @mime_content_type($path)) !== false ? $mimetype : 'text/plain';
  }

  public function getPath(): string
  {
    return $this->path;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getBaseName(): string
  {
    return $this->baseName;
  }

  public function getDirectory(): string
  {
    return $this->directory;
  }

  public function getExtension(): ?string
  {
    return $this->extension;
  }

  public function getMimetype(): string
  {
    return $this->mimetype;
  }
}
