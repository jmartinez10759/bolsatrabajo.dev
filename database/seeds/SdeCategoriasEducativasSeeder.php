<?php

use Illuminate\Database\Seeder;

class SdeCategoriasEducativasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [1,2,3,4];

        $doctorado = [
          #Doctorado
          'Arqueología Clásica'
          ,'Arqueología Prehistórica'
          ,'Ciencia Cognitiva y Lenguaje'
          ,'Ciencias de la Antigüedad y de la Edad Media'
          ,'Filología Española'
          ,'Filología Inglesa'
          ,'Filosofía'
          ,'Historia Comparada, Política y Social'
          ,'Historia de la Ciencia'
          ,'Historia del Arte y Musicología'
          ,'Lengua y Literatura Catalanas y Estudios Teatrales'
          ,'Lenguas y Culturas Románicas'
          ,'Psicología de la Comunicación y Cambio'
          ,'Teoría de la Literatura y Literatura Comparada'
          ,'Traducción y Estudios Interculturales'
          ,'Acuicultura'
          ,'Biodiversidad'
          ,'Bioinformática'
          ,'Biología Celular'
          ,'Biología y Biotecnología Vegetal'
          ,'Bioquímica, Biología Molecular y Biomedicina'
          ,'Biotecnología'
          ,'Ciencia de Materiales'
          ,'Ciencia y Tecnología Ambientales'
          ,'Derecho, Ciencia y Tecnología (LAST-JD)'
          ,'Ecología Terrestre'
          ,'Electroquímica. Ciencia y Tecnología'
          ,'Física'
          ,'Genética'
          ,'Geología'
          ,'Historia de la Ciencia'
          ,'Matemáticas'
          ,'Microbiología'
          ,'Química'
          ,'Análisis Económico'
          ,'Antropología Social y Cultural'
          ,'Ciencia Política, Políticas Públicas y Relaciones Internacionales'
          ,'Comunicación Audiovisual y Publicidad'
          ,'Comunicación Estratégica, Publicidad y Relaciones Públicas'
          ,'Comunicación y Periodismo'
          ,'Creación y Gestión de Empresas'
          ,'Demografía'
          ,'Derecho'
          ,'Derecho, Ciencia y Tecnología (LAST-JD)'
          ,'Economía Aplicada'
          ,'Economía, Organización y Gestión (Business Economics)'
          ,'Educación'
          ,'Estudios de Género: Cultura, Sociedades y Políticas'
          ,'Geografía'
          ,'Medios, Comunicación y Cultura'
          ,'Persona y Sociedad en el Mundo Contemporáneo'
          ,'Psicología de la Comunicación y Cambio'
          ,'Psicología de la Educación'
          ,'Seguridad Humana y Derecho Global'
          ,'Sociología'
          ,'Acuicultura'
          ,'Ciencia de los Alimentos'
          ,'Cirugía y Ciencias Morfológicas'
          ,'Farmacología'
          ,'Inmunología Avanzada'
          ,'Medicina'
          ,'Medicina y Sanidad Animales'
          ,'Metodología de la Investigación Biomédica y Salud Pública'
          ,'Neurociencias'
          ,'Pediatría, Obstetricia y Ginecología'
          ,'Producción Animal'
          ,'Psicología Clínica y de la Salud'
          ,'Psicología de la Comunicación y Cambio'
          ,'Psicología de la Salud y del Deporte'
          ,'Psiquiatría'
          ,'Bioinformática'
          ,'Derecho, Ciencia y Tecnología (LAST-JD)'
          ,'Informática'
          ,'Ingeniería Electrónica y de Telecomunicación'
          ,'Otro'
        ];
        $maestria = [
          #maestrias
           'Administración Pública'
           ,'Deportes y Educación Física'
           ,'Gestión Inmobiliaria - Urbanismo'
           ,'Informática e Información'
           ,'Programas Empresariales'
           ,'Riesgos Laborales'
           ,'Arquitectura y Urbanismo'
           ,'Derecho'
           ,'Gestión Medio Ambiente'
           ,'Ingeniería y Tecnología'
           ,'Psicología y Ciencias Sociales y de Comportamiento'
           ,'Salud y Medicina'
           ,'Calidad'
           ,'Economía y Finanzas'
           ,'Hotelería y Turismo'
           ,'MBA'
           ,'Publicidad y Marketing'
           ,'Seguridad Pública y Privada'
           ,'Ciencias Biológicas'
           ,'Educación'
           ,'Impuestos'
           ,'Periodismo y Ciencias de la Información'
           ,'Recursos Humanos - RRHH'
           ,'Otro'
        ];
        $licenciatura = [
          #catalogo de licenciaturas
          'Ingeniería Civil en Minas'
          ,'Geología'
          ,'Ingeniería Civil Metalúrgica'
          ,'Ingeniería en Minas y Metalurgia'
          ,'Ingeniería Civil Eléctrica'
          ,'Medicina'
          ,'Ingeniería Civil, plan común y licenciatura en Ciencias de la Ingeniería'
          ,'Ingeniería Civil Industrial'
          ,'Ingeniería Civil en Obras Civiles'
          ,'Ingeniería Civil Electrónica'
          ,'Ingeniería en Electricidad'
          ,'Ingeniería en Automatización, Instrumentación y Control'
          ,'Ingeniería Comercial'
          ,'Derecho'
          ,'Ingeniería Civil en Computación e Informática'
          ,'Ingeniería en Control de Gestión'
          ,'Construcción Civil'
          ,'Ingeniería Industrial'
          ,'Odontología'
          ,'Ingeniería Mecánica'
          ,'Ingeniería en Electrónica'
          ,'Ingeniería Civil Ambiental'
          ,'Ingeniería en Marketing'
          ,'Ingeniería en Construcción'
          ,'Ingeniería en Prevención de Riesgos'
          ,'Ingeniería en Computación e Informática'
          ,'Ingeniería en Sistemas'
          ,'Ingeniería en Geomensura y Cartografía'
          ,'Administración Publica'
          ,'Química y Farmacia'
          ,'Enfermería'
          ,'Otro'
        ];
        $bachillerato = [
              #carreras tecnicas
              'Técnico en Mantenimiento Industrial'
              ,'Técnico en Topografía'
              ,'Técnico en Instrumentación, Automatización y Control Industrial'
              ,'Técnico en Mecánica Industrial'
              ,'Técnico en Prevención de Riesgos'
              ,'Técnico en Electrónica y Electrónica Industrial'
              ,'Técnico en Electricidad y Electricidad Industrial'
              ,'Técnico en Mecánica Automotriz'
              ,'Técnico en Contabilidad Tributaria'
              ,'Técnico en Logística'
              ,'Técnico en Telecomunicaciones'
              ,'Técnico en Administración Financiera y Finanzas'
              ,'Técnico en Administración de Empresas'
              ,'Técnico en Administración de Redes y Soporte'
              ,'Técnico en Análisis de Sistemas'
              ,'Técnico en Dibujo Técnico e Industrial'
              ,'Técnico en Química (Análisis e Industrial)'
              ,'Técnico en Contabilidad General'
              ,'Técnico Agente o Visitador Médico'
              ,'Técnico en Comercio Exterior'
              ,'Otro'

        ];

        for ($i=0; $i < count( $doctorado ) ; $i++) {
              App\Model\CategoriasEducativasModel::create([
                 'id_nivel' 	=> $niveles[0]
                 ,'nombre' 	  => $doctorado[$i]
             ]);
        }

        for ($i=0; $i < count( $maestria ); $i++) {
            App\Model\CategoriasEducativasModel::create([
               'id_nivel' 	=> $niveles[1]
               ,'nombre' 	  => $maestria[$i]
           ]);
        }

        for ($i=0; $i < count( $licenciatura ); $i++) {
            App\Model\CategoriasEducativasModel::create([
               'id_nivel' 	=> $niveles[2]
               ,'nombre' 	  => $licenciatura[$i]
           ]);
        }

        for ($i=0; $i < count($bachillerato); $i++) {
              App\Model\CategoriasEducativasModel::create([
                 'id_nivel' 	=> $niveles[3]
                 ,'nombre' 	  => $bachillerato[$i]
             ]);
        }



    }



}
