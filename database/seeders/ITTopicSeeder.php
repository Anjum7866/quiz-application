<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ITTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'id' => 3,
                'name' => 'Data Science',
                'description' => 'Data science involves analyzing and interpreting complex data to make informed decisions and predictions. It combines statistics, programming, and domain knowledge.',
                'content' => 'data_science.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Cybersecurity',
                'description' => 'Cybersecurity focuses on protecting computer systems and networks from unauthorized access, attacks, and data breaches. It includes measures to ensure data confidentiality, integrity, and availability.',
                'content' => 'cybersecurity.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Internet of Things (IoT)',
                'description' => 'The Internet of Things refers to the network of physical devices, vehicles, buildings, and other items embedded with sensors, software, and connectivity. IoT enables these objects to collect and exchange data.',
                'content' => 'iot.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Blockchain Technology',
                'description' => 'Blockchain is a decentralized and distributed digital ledger that records transactions across multiple computers. It provides a secure and transparent way to track and verify data.',
                'content' => 'blockchain.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Machine Learning',
                'description' => 'Machine learning is a subset of AI that focuses on enabling computers to learn and make decisions without being explicitly programmed. It involves algorithms and statistical models.',
                'content' => 'machine_learning.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Big Data Analytics',
                'description' => 'Big data analytics involves processing and analyzing large datasets to extract meaningful insights. It helps organizations make data-driven decisions and identify trends and patterns.',
                'content' => 'big_data.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Virtual Reality (VR)',
                'description' => 'Virtual reality creates immersive environments using computer technology. Users can interact with and experience artificial 3D worlds, often through VR headsets.',
                'content' => 'vr.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Augmented Reality (AR)',
                'description' => 'Augmented reality overlays digital information onto the real world. AR is commonly used in applications like mobile games, navigation, and enhancing user experiences.',
                'content' => 'ar.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Quantum Computing',
                'description' => 'Quantum computing leverages quantum-mechanical phenomena to perform computations. It has the potential to solve complex problems that are currently infeasible for classical computers.',
                'content' => 'quantum_computing.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => 'Natural Language Processing (NLP)',
                'description' => 'Quantum computing leverages quantum-mechanical phenomena to perform computations. It has the potential to solve complex problems that are currently infeasible for classical computers.',
                'content' => 'quantum_computing.jpg',
                'content' => 'nlp.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'name' => 'Robotics',
                'description' => 'Robotics involves designing, constructing, and operating robots. Robots can be used in various industries, from manufacturing and healthcare to exploration and entertainment.',
                'content' => 'robotics.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'name' => 'Biotechnology',
                'description' => 'Biotechnology combines biology and technology to develop products and processes that improve human health, agriculture, and the environment. It includes areas like genetic engineering and drug development.',
                'content' => 'biotech.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'name' => 'Mobile App Development',
                'description' => 'Mobile app development involves creating software applications for mobile devices. Developers use programming languages and frameworks to design apps for platforms like iOS and Android.',
                'content' => 'mobile_app.jpg',
                'subject_id' => 46,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
