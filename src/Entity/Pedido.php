<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="pedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoProductoCantidad", mappedBy="pedido")
     */
    private $pedidoProductoCantidades;

    public function __construct()
    {
        $this->pedidoProductoCantidades = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * @return Collection|PedidoProductoCantidad[]
     */
    public function getPedidoProductoCantidades(): Collection
    {
        return $this->pedidoProductoCantidades;
    }

    public function addPedidoProductoCantidad(PedidoProductoCantidad $pedidoProductoCantidad): self
    {
        if (!$this->pedidoProductoCantidades->contains($pedidoProductoCantidad)) {
            $this->pedidoProductoCantidades[] = $pedidoProductoCantidad;
            $pedidoProductoCantidad->setPedidos($this);
        }

        return $this;
    }

    public function removePedidoProductoCantidad(PedidoProductoCantidad $pedidoProductoCantidad): self
    {
        if ($this->pedidoProductoCantidades->contains($pedidoProductoCantidad)) {
            $this->pedidoProductoCantidades->removeElement($pedidoProductoCantidad);
            // set the owning side to null (unless already changed)
            if ($pedidoProductoCantidad->getPedidos() === $this) {
                $pedidoProductoCantidad->setPedidos(null);
            }
        }

        return $this;
    }
}
