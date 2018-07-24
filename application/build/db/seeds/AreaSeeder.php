<?php


use Phinx\Seed\AbstractSeed;

class AreaSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'uid'    => 'area-001',
                'template'    => 'template-001',
                'machine_name'    => 'logo_area',
                'attributes'    => '{}',
                'parameters'    => '{}',
                'options'    => '{}',
                'scope'    => 'global',
            ],
            [
                'uid'    => 'area-002',
                'template'    => 'template-001',
                'machine_name'    => 'footer',
                'attributes'    => '{"class":{"0":"container"}}',
                'parameters'    => '{"html_tag":"div"}',
                'options'    => '{}',
                'scope'    => 'global',
            ],
            [
                'uid'    => 'area-003',
                'template'    => 'template-001',
                'machine_name'    => 'content_main_jumbotron',
                'attributes'    => '{"class":{"0":"jumbotron"}}',
                'parameters'    => '{"html_tag":"div"}',
                'options'    => '{}',
                'scope'    => 'page',
            ],
            [
                'uid'    => 'area-004',
                'template'    => 'template-001',
                'machine_name'    => 'content_main',
                'attributes'    => '{}',
                'parameters'    => '{"html_tag":"div"}',
                'options'    => '{}',
                'scope'    => 'page',
            ],
            [
                'uid'    => 'area-005',
                'template'    => 'template-001',
                'machine_name'    => 'menu_main',
                'attributes'    => '{"class":{"0":"collapse navbar-collapse"}}',
                'parameters'    => '{"html_tag":"div"}',
                'options'    => '{}',
                'scope'    => 'global',
            ],
            [
                'uid'    => 'area-006',
                'template'    => 'template-002',
                'machine_name'    => 'content_main',
                'attributes'    => '{}',
                'parameters'    => '{}',
                'options'    => '{}',
                'scope'    => 'page',
            ],
            [
                'uid'    => 'area-007',
                'template'    => 'template-003',
                'machine_name'    => 'content_main',
                'attributes'    => '{}',
                'parameters'    => '{}',
                'options'    => '{}',
                'scope'    => 'page',
            ],
            [
                'uid'    => 'area-008',
                'template'    => 'template-004',
                'machine_name'    => 'admin_menu',
                'attributes'    => '{"id":"admin-menu-area"}',
                'parameters'    => '{"html_tag":"div"}',
                'options'    => '{}',
                'scope'    => 'global',
            ],
        ];

        $areaTable = $this->table('area');
        $areaTable->truncate();
        $areaTable->insert($data)
            ->save();
    }
}
