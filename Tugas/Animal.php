<?php

# membuat class Animal
class Animal
{
    # property animals
    public $animals = [];

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data)
    {
        foreach ($data as $data) {
            array_push($this->animals, $data);
        }
    }

    # method index - menampilkan data animals
    public function index()
    {
        # gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->animals as $animals){
            echo $animals . "<br>";
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        # gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);

    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        $this->animals[$index] = $data;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        unset ($this->animals[$index]);
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animals = new Animal(["semut", "ulat"]);

echo "Index - Menampilkan seluruh hewan <br>";
$animals->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animals->store("kupu-kupu");
$animals->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animals->update(0, 'Lebah');
$animals->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animals->destroy(0);
$animals->index();
echo "<br>";