<?php

interface communDAO {
    public function add(object $objet);
    public function delete(int $no);
    public function edit(object $objet);
    public function research();
    public function researchNE(int $a);
}