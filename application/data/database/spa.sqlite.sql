BEGIN TRANSACTION;
CREATE TABLE "users" (
    "uid" TEXT,
    "username" TEXT,
    "password" TEXT,
    "created_at" TEXT,
    "updated_at" TEXT
);
INSERT INTO `users` VALUES ('1','jan@kowalski.name','moloko',NULL,NULL);
CREATE TABLE "user" (
	`uid`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`email`	varchar(128) NOT NULL,
	`full_name`	varchar(512) NOT NULL,
	`password`	varchar(256) NOT NULL,
	`status`	int(11) NOT NULL,
	`date_created`	datetime NOT NULL,
	`pwd_reset_token`	varchar(32) DEFAULT NULL,
	`pwd_reset_token_creation_date`	datetime DEFAULT NULL
);
INSERT INTO `user` VALUES (1,'jan@secalith.uk','jan','$2y$10$AcX/A1kuOuurYrppr1ecMOB3YhAab7ABMjuVmDVO6VTsiYT5AUQ96',1,'',NULL,NULL),
 (2,'accounts@secalith.uk','accounts','$2y$10$AcX/A1kuOuurYrppr1ecMOB3YhAab7ABMjuVmDVO6VTsiYT5AUQ96',1,'',NULL,NULL);
CREATE TABLE template (label TEXT, uid text PRIMARY KEY, name text, type text, location text);
INSERT INTO `template` VALUES (NULL,'template-001','home-page','view','app'),
 (NULL,'template-100','template_full','filesystem','template'),
 (NULL,'template-200','login','filesystem','auth'),
 (NULL,'template-201','user_create','filesystem','user'),
 (NULL,'template-202','update','filesystem','user'),
 (NULL,'template-203','delete','filesystem','user'),
 (NULL,'template-204','list','filesystem','user');
CREATE TABLE seo (description TEXT, page_uid TEXT, title TEXT, keywords TEXT, uid TEXT);
INSERT INTO `seo` VALUES ('homepage description','page-001','eCancer Homepage','keyword-1, keyword-2','seo-001'),
 ('/authenticate','b1360a73-3ded-4a51-93d1-dce5887d9b70','/authenticate','/authenticate','c1f591ec-f2b9-414b-ba53-9b097ed0496f'),
 ('/authenticate','130308e9-0738-4597-888b-226445328ee2','/authenticate','/authenticate','5bdd1581-6b93-4da0-9523-625a17c6ef80'),
 ('/authenticate','6d7418b2-23a0-45f1-8000-ca14a7f8321b','/authenticate','/authenticate','6eb4de1a-1d50-48f1-88d7-127169706385'),
 ('/authenticate','de48f111-a83a-47fc-af61-6c2369f6ff95','/authenticate','/authenticate','e48dcc53-05d1-4a80-a73d-5cc89137f0c1'),
 ('/test','aa670020-9717-4b64-b57d-f79ff1dcfca7','/test','/test','ef4ad825-b013-4ab0-8732-c292cbbc58b0'),
 ('/test','e4dbaba0-132c-467b-b28f-6dd0e1debeb9','/test','/test','cc03ea13-8cc1-47f3-bb37-f6b651407c0c'),
 ('/test','19c6f563-66e6-4d82-b1e2-de79296928b8','/test','/test','ae5e9e82-cf11-4457-9810-f4f7ec1ae052'),
 ('/test-001','34262337-3a31-4f20-a2a7-0809a68987c5','/test-001','/test-001','d30012aa-9421-44b5-9215-5819f796e5c3'),
 ('/test-001','64d8220f-8365-4b9f-8af7-23e85ca9a3a0','/test-001','/test-001','4e7943d6-612c-4ba6-86f9-3fc5c772d0dd'),
 ('/test-001','93d38dff-668d-4c47-93c0-49713178223e','/test-001','/test-001','c3b9789b-3946-4223-afd6-c0b38e795def'),
 ('/test-001','826b5583-cabc-44e3-bdf4-db9cb9da86db','/test-001','/test-001','35fec6f1-48fe-4728-b82e-4dca7ecf2d6f'),
 ('/test-001','ee04fe59-6ed7-41ab-bc26-65763ad9f94b','/test-001','/test-001','1d2b1793-9921-465b-a4e7-f77e14497ff3'),
 ('/test-001','fb129c81-fabd-4e1c-8ea5-8a8e8a3adc98','/test-001','/test-001','8ef6cebf-924b-48ea-bb1b-20e65fb25ed5'),
 ('/test-001','5c5e023d-0bb7-40d4-b269-f2ffbffd7050','/test-001','/test-001','c7d17c90-8a6c-42f0-9437-de4f631f6830'),
 ('/test-001','36f614c0-5e9d-480e-9462-1b2e149c6610','/test-001','/test-001','96dec7e0-43a0-473c-99ae-dc53b8dc0f2b'),
 ('/test-001','0ebf0348-c22d-4b55-bfd3-db3f8cc3dffa','/test-001','/test-001','8812f903-0f4c-49ad-b123-31f63c9c3a1c'),
 ('/test-001','9661e591-3f60-4cc5-a88d-a0abf0e91710','/test-001','/test-001','ef277496-335e-4725-bbbd-29406931e5d9'),
 ('/test-001','482ae0ca-070c-462c-9a57-8936d3f1472a','/test-001','/test-001','0d881852-2c2c-4793-83b3-f628cf775797'),
 ('/test-001','234ff6a1-7766-4fa5-a893-81ee1ed11a63','/test-001','/test-001','6c5f5b43-fa50-447b-8b8c-f3afe75bc9c5'),
 ('/twohhhh','6fce78c2-8970-4e8d-b6ef-200b4917fd19','/twohhhh','/twohhhh','a2e08bec-678a-4957-ab87-79e39964ca69'),
 ('','fd21597b-cbac-425f-b8db-c6e91646da72','hgkhjk','','07840512-3856-48aa-869b-58557789b8ca'),
 ('/url','0f8ed3a3-ed86-43c1-bcb7-701bbfe06c3c','/url','/url','28a05ae6-a2ed-4698-8d45-e9d5ada08285'),
 ('/url','601e6b19-647a-4648-a809-99884836cf36','/url','/url','43b0af5f-e5b5-4490-8616-ecf771025052'),
 ('/url','f643a8fa-874c-4ead-ab08-dfa7be5a9e9e','/url','/url','52a38a36-c453-4100-b02d-2c70c9aa0344'),
 ('/url','6c4d7885-0087-4f66-a1e6-95f77a8da2c1','/url','/url','61ce39d7-1b5e-4f9f-9320-6d06774167e1'),
 ('/url','1d5805a1-ab9d-4495-95a8-c9695dc20d56','/url','/url','5bc1c98c-fd80-4ccc-a219-ca7f4d846580'),
 ('/jnsfkjsd-2asdfasdf','5b46c600-5edf-49bb-aa6a-73804f84b141','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','320844e3-cbaf-4d36-a128-b6ba1fe088e3'),
 ('/jnsfkjsd-2asdfasdf','e387617b-64aa-430d-b197-275bd0c9da3b','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','27b6f959-51e3-4980-ac05-5d64bf45064a'),
 ('/jnsfkjsd-2asdfasdf','e1a76e88-4874-424f-ad70-320ce2b62cbe','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','d0447cf3-99b4-45c0-a319-1adc205d756e'),
 ('/jnsfkjsd-2asdfasdf','97799d3c-e7d0-4281-9a20-787e74f9e210','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','693f0295-7d9e-4e89-8275-a51e5dc78444'),
 ('/jnsfkjsd-2asdfasdf','e56eb87f-b951-448c-96f8-c00bb24f9ccf','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','ebcdaad3-6cfb-4e9b-94a4-939e11dbd0d9'),
 ('/jnsfkjsd-2asdfasdf','bde7cda7-8af7-4428-9228-3a9a7d353b0d','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','effa00cb-0d53-43e8-b930-54339735e108'),
 ('/jnsfkjsd-2asdfasdf','65437317-db94-4011-a74d-4d884ac38830','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','252f9159-0051-4ad9-950e-04c0a21df3b1'),
 ('/jnsfkjsd-2asdfasdf','93a9717e-9ab0-4ad1-aff7-44182646b382','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','a4c60900-b540-4cbb-bfb7-44e7f487bcb1'),
 ('/jnsfkjsd-2asdfasdf','9b6aa2c9-ba2c-4539-84dc-88d73a1db95c','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','df0cc749-b6a5-4d3d-9ea2-d932608639a3'),
 ('/jnsfkjsd-2asdfasdf','4ee2f5c8-89a0-4964-8b5f-383f21b08e1b','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','ae7281e5-e91c-414e-b108-3ea8ebc80e52'),
 ('/jnsfkjsd-2asdfasdf','c2714848-974b-4098-8809-4d8f4ce9fa0a','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','8f025bc9-4519-49ed-9903-fcf4e7abea66');
CREATE TABLE route_routes (
    "parent_uid" TEXT,
    "options" TEXT,
    "route" NULL,
    "scenario" TEXT,
    "action" TEXT,
    "controller" TEXT,
    "submodule" TEXT,
    "module" TEXT,
    "uid" TEXT,
    "route_uid" TEXT,
    "name" TEXT,
    "constraints" TEXT DEFAULT ('{}')
, "methods" TEXT   DEFAULT ('{}'));
INSERT INTO `route_routes` VALUES ('0','{''defaults'':{}}','/','display','index','\Page\Action\PageAction','route','singlepageapplication','route-route-001','route-001','home','{}','{''defaults'':{}}'),
 ('0','','/page','display','display','\Page\Action\PageAction','','route','route-route-004','route-004','page','{}','{ "bar": "baz" }'),
 ('0','{''defaults'':{}}','/template/001.html','display','index','\Page\Action\PageAction','route','singlepageapplication','route-route-010','route-010','template_001','{}','{}'),
 ('0','{}','/login','display','index','\Page\Action\PageAction','route','route','route-route-login','route-login','login','{}','{}'),
 ('0','{}','/company','display','index','\Page\Action\PageAction','route','route','route-route-100','route-100','example_company','{}','{}'),
 ('0','{}','/login/process','process','index','\Auth\Action\LoginProcessAction','route','auth','route-route-login.process','route-login.process','login_process','{}','{}'),
 ('0','{}','/logout','process','index','\Auth\Action\LogoutAction','route','auth',NULL,NULL,NULL,'{}','{}'),
 ('0','{}','/user/read/:uid','display','index','\User\Action\ReadAction','route','user','route-route-user.read','route-user.read','user.read','{}','{}'),
 ('0','{}','/user/edit/:uid','display','index','\User\Action\UpdateAction','route','user','route-route-user.update','route-user.update','user.update','{}','{}'),
 ('0','{}','/user/delete/:uid','display','index','\User\Action\DeleteAction','route','user','route-route-user.delete','route-user.delete','user.delete','{}','{}'),
 ('0','{}','/user/list','display','index','\User\Action\ListAction','route','user','route-route-page.list','route-user.list','user.list','{}','{}');
CREATE TABLE route_acl (
    "route_name" VARCHAR(64) NOT NULL,
    "role" VARCHAR(64) NOT NULL,
    "permission" INT(1) NOT NULL DEFAULT (0)
);
INSERT INTO `route_acl` VALUES ('home','guest',1),
 ('home','guest',1),
 ('auth_login','guest',1),
 ('auth_login','member',0),
 ('auth_login_process','guest',1),
 ('auth_login_process','member',0),
 ('auth_register','guest',1),
 ('auth_register','member',0),
 ('auth_register_process','guest',1),
 ('auth_register_process','member',0),
 ('auth_logout','guest',0),
 ('auth_logout','member',1),
 ('page_create','guest',0),
 ('page_create','member',1),
 ('page_read','guest',1),
 ('page_read','guest',1),
 ('page_update','guest',0),
 ('page_update','member',1),
 ('page_delete','guest',0),
 ('page_delete','member',1),
 ('area_create','guest',0),
 ('area_create','guest',0),
 ('area_read','guest',1),
 ('area_read','guest',1),
 ('area_update','guest',0),
 ('area_update','guest',0),
 ('area_delete','member',0),
 ('area_delete','member',0),
 ('block_create','member',0),
 ('block_create','member',0),
 ('block_read','member',1),
 ('block_read','member',1),
 ('block_update','member',0),
 ('block_update','member',0),
 ('block_delete','member',0),
 ('block_delete','member',0),
 ('content_create','member',0),
 ('content_create','member',0),
 ('content_read','member',1),
 ('content_read','member',1),
 ('content_update','member',0),
 ('content_update','member',0),
 ('content_delete','member',0),
 ('content_delete','member',0);
CREATE TABLE "route" (
  "uid" text NULL,
  "route_name" text NULL,
  PRIMARY KEY ("uid")
);
INSERT INTO `route` VALUES ('route-001','home'),
 ('route-004','page'),
 ('route-100','example_company'),
 ('route-login','login'),
 ('user-create-display','user-create-display'),
 ('route-login.process','login_process'),
 ('route-logout','logout'),
 ('route-user.read','user.read'),
 ('route-user.update','user.update'),
 ('route-user.delete','user.delete'),
 ('route-user.list','user.list');
CREATE TABLE rbac_users (
    "user_uid" TEXT,
    "role_uid" TEXT
);
INSERT INTO `rbac_users` VALUES ('1','3');
CREATE TABLE "rbac" (
    "role_id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "parent_role_id" TEXT,
    "role_name" TEXT
);
INSERT INTO `rbac` VALUES (2,'0','guest'),
 (3,'0','admin'),
 (4,'0','editor'),
 (5,'0','developer'),
 (6,'0','member');
CREATE TABLE page (page_cache TEXT, route_url TEXT, uid text PRIMARY KEY, name text, template text, route text);
INSERT INTO `page` VALUES ('1','/','page-001','home','template-001','route-001'),
 ('0','/page','page-004','page','template-005','route-004'),
 ('1','/company','page-100','example_company','template-100','route-100'),
 ('0','/login','page-login','login','template-200','route-login'),
 ('0','/user/list','page-user.list','user.list','template-204','route-user.list'),
 ('0','/user/create','page-user.create','user.create','template-201','route-user.create'),
 ('0','/login/process','page-login.process','login_process','template-001','route-login.process'),
 ('0','/logout','page-logout','logout',NULL,'route-logout'),
 ('0','/user/read/:uid','page-user.read','user.read','template-201','route-user.read'),
 ('0','/user/edit/:uid','page-user.update','user.update','template-202','route-user.update'),
 ('0','/user/delete/:uid','page-user.delete','user.delete','template-203','route-user.delete');
CREATE TABLE navigation (
    "route" TEXT,
    "uid" TEXT,
    "label" TEXT,
    "default_language" TEXT,
    "name" TEXT
, "parent" TEXT   DEFAULT (0));
INSERT INTO `navigation` VALUES ('homepage','main_menu-homepage-001','Home','en_gb','main_menu','0'),
 ('login','main_menu-journal-001','Journal','en_gb','user_menu','0');
CREATE TABLE menu_item (item_order NUMERIC, location TEXT, status NUMERIC, label TEXT, menu_uid TEXT, uid TEXT PRIMARY KEY);
INSERT INTO `menu_item` VALUES (1,'http://ecancerpatient.org',1,'ecancerpatient','menu-001','menu_item_001'),
 (2,'/en/',1,'English','menu-001','menu_item_002'),
 (1,'/homepage',1,'Homepage','menu-002','menu_item_003'),
 (2,'/journal',1,'Journal','menu-002','menu_item_004'),
 (3,'/video',1,'Video','menu-002','menu_item_005'),
 (4,'/news',1,'News','menu-002','menu_item_006'),
 (5,'/conferences',1,'Conferences','menu-002','menu_item_007'),
 (6,'/e-learning',1,'E-Learning','menu-002','menu_item_008'),
 (7,'/projects',1,'Projects','menu-002','menu_item_009'),
 (8,'/search',1,'Search','menu-002','menu_item_010'),
 (3,'/login/',1,'<span style="color:#ccf131" class="glyphicon glyphicon-user" aria-hidden="true"></span>','menu-001','menu_item_011');
CREATE TABLE form_fieldset (
    "uid" TEXT,
    "form_uid" TEXT,
    "name" TEXT,
    "type" TEXT,
    "attributes" TEXT,
    "options" TEXT,
    "parameters" TEXT,
    "priority" INTEGER DEFAULT (100)
);
INSERT INTO `form_fieldset` VALUES ('dQj T pHo','lHlCIFRgbv','AsaEkgRzIf','UH hVCRHTx','UZ INSHasH','vodQk kXuN','SxJVShM c',1895244856),
 ('mTrunNxXQP','JJsX JRQil','rqFBwayv P','NubHkHYOfZ','mvVxstKjvh','VaHOuTXoEW','oppvRNBYqN',1122215465);
CREATE TABLE form_element_input (uid TEXT, form_element_uid TEXT, name TEXT, required NUMERIC, options TEXT, attributes TEXT, parameters TEXT);
INSERT INTO `form_element_input` VALUES ('form-element-filter-001','form-001','not_empty',1,'{}','{}','{}');
CREATE TABLE form_element (
    "uid" TEXT,
    "form_uid" TEXT,
    "name" TEXT,
    "options" TEXT,
    "attributes" TEXT,
    "parameters" TEXT
, "label" TEXT);
INSERT INTO `form_element` VALUES ('form-element-001','form-001','email','{}','{}','{}',NULL),
 ('form-element-002','form-001','password','{}','{}','{}',NULL),
 ('form-element-003','form-002','value','{}','{}','{}',NULL),
 ('fe-010','form-010','random_001','{}','{}','{}','Do you currently have health insurance, or not?'),
 ('fe-011','form-010','random_002','{}','{}','{}','Who pays for your health insurance? (Check all that apply)'),
 ('fe-012','form-010','random_003','{}','{}','{}','How much money, in U.S. dollars, do you spend on health insurance premiums, deductibles, copays, and co-insurance fees in a typical month?'),
 (NULL,NULL,NULL,NULL,NULL,NULL,'How much money, in U.S. dollars, do you spend on healthcare in a typical month? (Count all healthcare-related costs, including health insurance premiums, deductibles, copays, co-insurance fees, and any other out-of-pocket expenses for medical, dental, or vision services and medications.)');
CREATE TABLE form (uid TEXT, name TEXT, attributes TEXT, options TEXT, parameters TEXT);
INSERT INTO `form` VALUES ('form-001','editor_login','{"class":{"0":"form-signin"}}','{}','{}'),
 ('form-002','content_create','{"class":{"0":"form-content-create"}}','{}','{}'),
 ('form-003','login','{"action":"/login/process"}','{}','{}'),
 ('form-004','user_create','{"action":"/user/create/process"}','{}','{}');
CREATE TABLE content (
    "uid" TEXT,
    "block" TEXT,
    "order" INTEGER,
    "template" TEXT,
    "type" TEXT,
    "attributes" TEXT DEFAULT ('{}'),
    "parameters" TEXT DEFAULT ('{}'),
    "options" TEXT DEFAULT ('{}'),
    "content" TEXT
, "parent_uid" TEXT  NOT NULL  DEFAULT (0));
INSERT INTO `content` VALUES ('content-001','block-001',1,'template-001','image','{"src":"/zf-logo.png","alt":"SPA"}','{"html_tag":"img"}','{}','','0'),
 ('content-017','block-012',1,'template-001','text','{}','{"html_tag":"h1"}','{}','[::content:content-044::] in minutes!','0'),
 ('content-018','block-012',1,'template-001','text','{}','{"html_tag":"p"}','{}','Prow scuttle parrel provost Sail ho shrouds spirits boom mizzenmast yardarm. Pinnace holystone mizzenmast quarter crow''s nest nipperkin grog yardarm hempen halter furl. Swab barque interloper chantey doubloon starboard grog black jack gangway rutters.','0'),
 ('content-019','block-013',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-expressive/getting-started/features/"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-021::] Lean & Agile','0'),
 ('content-021','block-013',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-refresh"}}','{"html_tag":"i"}','{}',' ','content-019'),
 ('content-022','block-013',2,'template-001','text','{}','{"html_tag":"p"}','{}','Expressive is fast, small and perfect for rapid application development, prototyping and api''s. You decide how you extend it and choose the best packages from major framework or standalone projects.','0'),
 ('content-023','block-015',1,'template-001','text','{"href":"https://github.com/zendframework/zend-diactoros"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-024::] Built-in Themes','0'),
 ('content-024','block-015',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-exchange"}}','{"html_tag":"i"}','{}',' ','content-023'),
 ('content-025','block-015',2,'template-001','text','{}','{"html_tag":"p"}','{}','HTTP messages are the foundation of web development. Web browsers and HTTP clients such as cURL create HTTP request messages that are sent to a web server, which provides an HTTP response message. Server-side code receives an HTTP request message, and returns an HTTP response message.','0'),
 ('content-026','block-016',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-027::] Advanced Forms','0'),
 ('content-027','block-016',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-cube"}}','{"html_tag":"i"}','{}',' ','content-026'),
 ('content-028','block-016',2,'template-001','text','{}','{"html_tag":"p"}','{}','Expressive promotes and advocates the usage of Dependency Injection/Inversion of Control containers when writing your applications. Expressive supports multiple containers which typehints against [::content:content-039::].','0'),
 ('content-029','block-019',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-030::] Caching System','0'),
 ('content-030','block-019',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-dot-circle-o"}}','{"html_tag":"i"}','{}',' ','content-029'),
 ('content-031','block-019',2,'template-001','text','{}','{"html_tag":"p"}','{}','Middleware is code that exists between the request and response, and which can take the incoming request, perform actions based on it, and either complete the response or pass delegation on to the next middleware in the queue. Your application is easily extended with custom middleware created by yourself or [::content:content-038::].','0'),
 ('content-032','block-020',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-033::] Various Data Storage','0'),
 ('content-033','block-020',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-plane"}}','{"html_tag":"i"}','{}',' ','content-032'),
 ('content-034','block-020',2,'template-001','text','{}','{"html_tag":"p"}','{}','We provide you with SQL database out of the box. It is possible for you to store your application in the Amazon Cloud. In case you decide to resign from our services for some reason, you will be able to access your data! Storing your data in the cloud would require you to use third party paid services.','0'),
 ('content-035','block-021',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-036::] Email Queueing','0'),
 ('content-036','block-021',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-files-o"}}','{"html_tag":"i"}','{}',' ','content-035'),
 ('content-037','block-021',2,'template-001','text','{}','{"html_tag":"p"}','{}','Our Single Page Application hs built-in email sender application which allows you to edit email templates!<br />
Also, we would let you to watch you live the Email Queue Application in action.','0'),
 ('content-038','block-019',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-expressive/getting-started/features/","target":"_blank"}','{"html_tag":"a"}','{}','others','content-031'),
 ('content-039','block-016',1,'template-001','text','{"href":"https://github.com/container-interop/container-interop","target":"_blank"}','{"html_tag":"a"}','{}','container-interop','content-028'),
 ('content-040','block-020',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-router/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"p"} }}}','See more about Data Storage options.','0'),
 ('content-041','block-021',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-view/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"p"} }}}','Read more about the Email Queue Application.','0'),
 ('content-042','block-030',1,'template-001','text','{}','{"html_tag":"hr"}','{}',' ','0'),
 ('content-043','block-030',2,'template-001','text','{}','{"html_tag":"p"}','{}','© Secalith Ltd ; company@secalith.uk ; 01179773002','0'),
 ('content-044','block-012',NULL,'template-001','text','{"href":"http://google.uk"}','{"html_tag":"a"}','{}','Create Survey','content-017'),
 ('content-045',NULL,3,'template-001','icon','{"class":"fa fa-wrench"}','{"html_tag":"i"}','{}',' ','0'),
 ('content-046','block-031',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-expressive/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','[::content:content-049::] Docs','0'),
 ('content-047','block-031',2,'template-001','text','{"href":"https://github.com/zendframework/zend-expressive","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','[::content:content-050::] Contribute','0'),
 ('content-048','block-031',3,'template-001','text','{"href":"/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Ping Test','0'),
 ('content-049','block-031',1,'template-001','text','{"class":{"0":"fa","1":"fa fa-book"}}','{"html_tag":"i"}','{}',' ','content-046'),
 ('content-050','block-031',1,'template-001','text','{"class":{"0":"fa","1":"fa-wrench"}}','{"html_tag":"i"}','{}',' ','content-047'),
 ('content-051','block-033',1,'template-200','text','{}','{"html_tag":"h2"}','{}','Login','0'),
 ('content-052','block-033',3,'template-200','text','{}','{}','{}','Or use the one of the services:','0'),
 ('content-060','block-050',1,'template-001','text','{"href":"/login"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Login','0'),
 ('content-061','block-050',2,'template-001','text','{"href":"/logout"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Logout','0'),
 ('content-062','block-050',3,'template-001','text','{"href":"[::{\"url\":{\"page.update\":{\"url\":\"uid\"}}}::]"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Edit this Page','0'),
 ('content-063','block-050',4,'template-001','text','{"href":"[::{\"url\":\"page.list\"}::]"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Pages','0'),
 ('content-064','block-050',5,'template-001','text','{"href":"[::{\"url\":\"user.list\"}::]"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Users','0'),
 ('content-065','block-050',6,'template-001','text','{"href":"[::{\"url\":\"user.account\"}::]"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Logged in as <strong>[::viewHelper:getIdentity::]</strong>','0');
CREATE TABLE "configuration" (module TEXT, name text(32), value text);
INSERT INTO `configuration` VALUES (NULL,'title','eCancer Content'),
 (NULL,'description','Single Page Application 01'),
 (NULL,'keywords','SPA, Single Page'),
 ('cache','cache_db','1'),
 ('cache','cache_api','1'),
 ('cache','cache_action','1'),
 ('cache','cache_fullpage','1'),
 ('cache','cache_settings_status','1'),
 ('cache','cache_route','1');
CREATE TABLE "block_form" (
	`uid`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`block_uid`	TEXT,
	`form_uid`	TEXT,
	`form_fqdn`	TEXT,
	`form_action`	TEXT
);
INSERT INTO `block_form` VALUES (4,'block-033','form-003','\Auth\Form\LoginForm','[::url:login::]'),
 (5,'block-034','form-004','\User\Form\CreateForm','[::url:user.create.process::]');
CREATE TABLE block (
    "uid" TEXT,
    "area" TEXT,
    "attributes" TEXT DEFAULT ('{}'),
    "parameters" TEXT DEFAULT ('{}'),
    "options" TEXT DEFAULT ('{}'),
    "type" TEXT,
    "template" TEXT,
    "order" INTEGER,
    "name" TEXT,
    "parent_uid" TEXT
, "content" TEXT   DEFAULT (' '));
INSERT INTO `block` VALUES ('block-001','area-001','{"class":{"0":"navbar-brand"},"href":"/"}','{"html_tag":"a"}','{}','content','template-001',1,'a','0',' '),
 ('block-013','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',1,'ww','block-017',' '),
 ('block-015','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',2,'dd','block-017',' '),
 ('block-016','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',3,'dds','block-017',' '),
 ('block-017','area-007','{"class":"row"}','{"html_tag":"div"}','{}','content','template-001',1,'sssss','0','[::block:block-013::][::block:block-015::][::block:block-016::]'),
 ('block-018','area-007','{"class":"row"}','{"html_tag":"div"}','{}','content','template-001',2,'ddss','0','[::block:block-019::][::block:block-020::][::block:block-021::]'),
 ('block-019','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',1,'dh','block-018',' '),
 ('block-020','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',2,'jxdf','block-018',' '),
 ('block-021','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',3,'ssa','block-018',' '),
 ('block-012','area-006','{}','{}','{}','content','template-001',1,'dddsjf','0',' '),
 ('block-030','area-004','{}','{}','{}','content','template-001',1,'dfdghj','0',' '),
 ('block-031','area-009','{"class":"nav navbar-nav"}','{"html_tag":"ul"}','{}','block::list','template-001',2,'ddar','0',''),
 ('block-032','area-0091','{}','{}','{}','app::navigation::simple',NULL,1,'sk','0',' '),
 ('block-033','area-200','{}','{}','{}','form::fqdn','template-200',1,'ssa','0','[::content:content-051::][::form:form-003::][::content:content-052::]'),
 ('block-034','area-201','{}','{}','{}','form::fqdn','template-201',NULL,NULL,'0',' '),
 ('block-050','area-009','{"class":"nav navbar-nav navbar-right"}','{"html_tag":"ul"}','{}','block::list','template-001',3,'dye','0',' ');
CREATE TABLE "area" (
  "uid" text NULL,
  "template" text NULL,
  "machine_name" text NULL,
  "attributes" text NULL DEFAULT '{}',
  "parameters" text NULL DEFAULT '{}',
  "options" text NULL DEFAULT '{}',
  "scope" text NULL,
  PRIMARY KEY ("uid")
);
INSERT INTO `area` VALUES ('area-001','template-001','logo_area','{}','{}','{}','global'),
 ('area-006','template-001','content_main_jumbotron','{"class":{"0":"jumbotron"}}','{"html_tag":"div"}','{}','page'),
 ('area-007','template-001','content_main','{}','{"html_tag":"div"}','{}','page'),
 ('area-004','template-001','footer','{"class":{"0":"container"}}','{"html_tag":"div"}','{}','global'),
 ('area-009','template-001','menu_main','{"class":{"0":"collapse navbar-collapse"}}','{"html_tag":"div"}','{}','global'),
 ('area-200','template-200','content_main','{}','{}','{}','page'),
 ('area-201','template-201','content_main','{}','{}','{}','page');
CREATE TABLE acl
(
    uid VARCHAR(64) PRIMARY KEY,
    name VARCHAR(32),
    label VARCHAR(255)
);
INSERT INTO `acl` VALUES ('4cce19f0-0e9b-4181-aaa5-ce2a29cab97b','guest','Guest'),
 ('3e0fbdff-b266-49d8-ac88-aaec6e373a20','member','Member');
CREATE INDEX "uid_template" on area (template ASC);
CREATE UNIQUE INDEX "uid_content" on content (uid ASC);
CREATE UNIQUE INDEX "uid_block" on block (uid ASC);
CREATE INDEX "uid_area" on area (uid ASC);
CREATE UNIQUE INDEX "route_route_name" ON "route" ("route_name");
CREATE UNIQUE INDEX acl_uid_uindex ON acl (uid);
CREATE UNIQUE INDEX acl_name_uindex ON acl (name);
COMMIT;
