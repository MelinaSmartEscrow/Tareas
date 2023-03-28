<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TareaRepository;
use Dracoder\EntityBundle\Model\AbstractTimetrackeableEntity;

/**
 * @ORM\Entity(repositoryClass=TareaRepository::class)
 */
class Tarea extends AbstractTimetrackeableEntity
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prioridad;

    /**
     * @ORM\Column(type="integer")
     */
    private $horas;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tarea")
     */
    private $user;

    public function __toString()
    {
        return $this->titulo;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getPrioridad(): ?string
    {
        return $this->prioridad;
    }

    public function setPrioridad(string $prioridad): self
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    public function getHoras(): ?int
    {
        return $this->horas;
    }

    public function setHoras(int $horas): self
    {
        $this->horas = $horas;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
