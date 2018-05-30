<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
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
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contrasena;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pedido", mappedBy="cliente", orphanRemoval=true)
     */
    private $pedidos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ClienteDireccion", mappedBy="cliente", orphanRemoval=true)
     */
    private $clientedireccion;

    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
        $this->clientedireccion = new ArrayCollection();
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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): self
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * @return Collection|Pedido[]
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedido $pedido): self
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos[] = $pedido;
            $pedido->setCliente($this);
        }

        return $this;
    }

    public function removePedido(Pedido $pedido): self
    {
        if ($this->pedidos->contains($pedido)) {
            $this->pedidos->removeElement($pedido);
            // set the owning side to null (unless already changed)
            if ($pedido->getCliente() === $this) {
                $pedido->setCliente(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ClienteDireccion[]
     */
    public function getClientedireccion(): Collection
    {
        return $this->clientedireccion;
    }

    public function addClientedireccion(ClienteDireccion $clientedireccion): self
    {
        if (!$this->clientedireccion->contains($clientedireccion)) {
            $this->clientedireccion[] = $clientedireccion;
            $clientedireccion->setCliente($this);
        }

        return $this;
    }

    public function removeClientedireccion(ClienteDireccion $clientedireccion): self
    {
        if ($this->clientedireccion->contains($clientedireccion)) {
            $this->clientedireccion->removeElement($clientedireccion);
            // set the owning side to null (unless already changed)
            if ($clientedireccion->getCliente() === $this) {
                $clientedireccion->setCliente(null);
            }
        }

        return $this;
    }
}
