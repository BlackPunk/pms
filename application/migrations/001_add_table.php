<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_table extends CI_Migration
{

        public function up()
        {
                /***** Tabel Appointment *****/
                $this->dbforge->add_field(array(
                        'id_appointment' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'id_pasien' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'tanggal' => array(
                                'type' => 'DATE',
                                'null' => TRUE,
                        ),
                        'jam' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 20,
                        ),
                ));
                $this->dbforge->add_key('id_appointment', TRUE);
                $this->dbforge->create_table('appointment');

                /***** Tabel Tagihan *****/
                $this->dbforge->add_field(array(
                        'id_tagihan' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'id_pasien' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'mode_pembayaran' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 10,
                        ),
                        'status_pembayaran' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 15,
                        ),
                        'deskripsi_tagihan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                        'jumlah_tagihan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                        'tanggal_invoice' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                ));
                $this->dbforge->add_key('id_tagihan', TRUE);
                $this->dbforge->create_table('tagihan');

                /***** Tabel Pasien *****/
                $this->dbforge->add_field(array(
                        'id_pasien' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'nama_p' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                        'usia' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'j_kelamin' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 15,
                        ),
                        'no_hp' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 15,
                        ),
                        'alamat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                        'tinggi' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 5,
                        ),
                        'berat' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'gol_darah' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 10,
                        ),
                        'tekanan_darah' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'detak_jantung' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'pernapasan' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'alergi' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                        'diet' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 10,
                        ),
                ));
                $this->dbforge->add_key('id_pasien', TRUE);
                $this->dbforge->create_table('pasien');

                /***** Tabel Resep *****/
                $this->dbforge->add_field(array(
                        'id_resep' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'id_pasien' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'gejala' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                        'diagnosa' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                        'obat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                        'catatan_obat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                        'tanggal' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                        ),
                ));
                $this->dbforge->add_key('id_resep', TRUE);
                $this->dbforge->create_table('resep');

                /***** Tabel User *****/
                $this->dbforge->add_field(array(
                        'id_user' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                        'nama' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                        'no_hp' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 15,
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                        ),
                ));
                $this->dbforge->add_key('id_user', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('appointment');
                $this->dbforge->drop_table('invoice');
                $this->dbforge->drop_table('pasien');
                $this->dbforge->drop_table('resep');
                $this->dbforge->drop_table('users');
        }
}
