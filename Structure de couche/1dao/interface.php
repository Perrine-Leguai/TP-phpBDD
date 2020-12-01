<?php

interface communDAO {
    public function add(object $objet);
    public function delete(int $no);
    public function edit(object $objet);
    public function research(string $where=null);
    public function researchNE(int $a);
}