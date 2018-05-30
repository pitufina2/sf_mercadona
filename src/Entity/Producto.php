<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoProductoCantidad", mappedBy="producto")
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

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
            $pedidoProductoCantidad->setProductos($this);
        }

        return $this;
    }

    public function removePedidoProductoCantidad(PedidoProductoCantidad $pedidoProductoCantidad): self
    {
        if ($this->pedidoProductoCantidades->contains($pedidoProductoCantidad)) {
            $this->pedidoProductoCantidades->removeElement($pedidoProductoCantidad);
            // set the owning side to null (unless already changed)
            if ($pedidoProductoCantidad->getProductos() === $this) {
                $pedidoProductoCantidad->setProductos(null);
            }
        }

        return $this;
    }
}
