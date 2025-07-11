<?php 

class Curso {
    private ?int $id;
    private ?string $nome;
    private ?string $turno;



    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of turno
     */
    public function getTurno(): ?string
    {
        return $this->turno;
    }
    public function getTurnoTexto():?string {
        if ($this->turno === 'M') {
            return 'Matutino';
        } elseif ($this->turno === 'V') {
            return 'Vespertino';
        } elseif ($this->turno === 'N') {
            return 'Noturno';
        } else {
            return 'Indefinido';
        }
    }

    /**
     * Set the value of turno
     */
    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }
}


?>