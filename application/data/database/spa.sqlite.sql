
DROP TABLE IF EXISTS `navigation`;
CREATE TABLE IF NOT EXISTS `navigation` (
    `route`    TEXT,
    `uid`    TEXT,
    `label`    TEXT,
    `default_language` TEXT,
    `name` TEXT,
    `parent` TEXT
);
INSERT INTO `navigation` VALUES ('homepage','main_menu-homepage-001','Home','en_gb','main_menu','0');
INSERT INTO `navigation` VALUES ('login','main_menu-journal-001','Journal','en_gb','user_menu','0');
DROP TABLE IF EXISTS `form_element`;
CREATE TABLE IF NOT EXISTS `form_element` (
    `uid`    TEXT,
    `form_uid`    TEXT,
    `name`    TEXT,
    `options`    TEXT,
    `attributes`    TEXT,
    `parameters`    TEXT,
    `label`    TEXT
);
INSERT INTO `form_element` VALUES ('form-element-001','form-001','email','{}','{}','{}',NULL);
INSERT INTO `form_element` VALUES ('form-element-002','form-001','password','{}','{}','{}',NULL);
INSERT INTO `form_element` VALUES ('form-element-003','form-002','value','{}','{}','{}',NULL);
INSERT INTO `form_element` VALUES ('fe-010','form-010','random_001','{}','{}','{}','Do you currently have health insurance, or not?');
INSERT INTO `form_element` VALUES ('fe-011','form-010','random_002','{}','{}','{}','Who pays for your health insurance? (Check all that apply)');
INSERT INTO `form_element` VALUES ('fe-012','form-010','random_003','{}','{}','{}','How much money, in U.S. dollars, do you spend on health insurance premiums, deductibles, copays, and co-insurance fees in a typical month?');
INSERT INTO `form_element` VALUES (NULL,NULL,NULL,NULL,NULL,NULL,'How much money, in U.S. dollars, do you spend on healthcare in a typical month? (Count all healthcare-related costs, including health insurance premiums, deductibles, copays, co-insurance fees, and any other out-of-pocket expenses for medical, dental, or vision services and medications.)');
DROP TABLE IF EXISTS `block`;
CREATE TABLE IF NOT EXISTS `block` (
    `uid`    TEXT,
    `area`    TEXT,
    `attributes`    TEXT,
    `parameters`    TEXT,
    `options`    TEXT,
    `type`    TEXT,
    `template`    TEXT,
    `order`    INTEGER,
    `name`    TEXT,
    `parent_uid`    TEXT,
    `content`    TEXT
);
INSERT INTO `block` VALUES ('block-001','area-001','{"class":{"0":"navbar-brand"},"href":"/"}','{"html_tag":"a"}','{}','content','template-001',1,'a','0',' ');
INSERT INTO `block` VALUES ('block-013','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',1,'ww','block-017',' ');
INSERT INTO `block` VALUES ('block-015','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',2,'dd','block-017',' ');
INSERT INTO `block` VALUES ('block-016','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',3,'dds','block-017',' ');
INSERT INTO `block` VALUES ('block-017','area-007','{"class":"row"}','{"html_tag":"div"}','{}','content','template-001',1,'sssss','0','[::block:block-013::][::block:block-015::][::block:block-016::]');
INSERT INTO `block` VALUES ('block-018','area-007','{"class":"row"}','{"html_tag":"div"}','{}','content','template-001',2,'ddss','0','[::block:block-019::][::block:block-020::][::block:block-021::]');
INSERT INTO `block` VALUES ('block-019','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',1,'dh','block-018',' ');
INSERT INTO `block` VALUES ('block-020','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',2,'jxdf','block-018',' ');
INSERT INTO `block` VALUES ('block-021','area-007','{"class":"col-md-4"}','{"html_tag":"div"}','{}','content','template-001',3,'ssa','block-018',' ');
INSERT INTO `block` VALUES ('block-012','area-006','{}','{}','{}','content','template-001',1,'dddsjf','0',' ');
INSERT INTO `block` VALUES ('block-030','area-004','{}','{}','{}','content','template-001',1,'dfdghj','0',' ');
INSERT INTO `block` VALUES ('block-031','area-009','{"class":"nav navbar-nav"}','{"html_tag":"ul"}','{}','block::list','template-001',2,'ddar','0',' ');
INSERT INTO `block` VALUES ('block-032','area-009','{}','{}','{}','app::navigation::simple',NULL,1,'sk','0',' ');
DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
    `uid`    TEXT,
    `block`    TEXT,
    `order`    INTEGER,
    `template`    TEXT,
    `type`    TEXT,
    `attributes`    TEXT,
    `parameters`    TEXT,
    `options`    TEXT,
    `content`    TEXT,
    `parent_uid`    TEXT NOT NULL
);
INSERT INTO `content` VALUES ('content-001','block-001',1,'template-001','image','{"src":"/zf-logo.png","alt":"SPA"}','{"html_tag":"img"}','{}','','0');
INSERT INTO `content` VALUES ('content-017','block-012',1,'template-001','text','{}','{"html_tag":"h1"}','{}','[::content:content-044::] in minutes!','0');
INSERT INTO `content` VALUES ('content-018','block-012',1,'template-001','text','{}','{"html_tag":"p"}','{}','Prow scuttle parrel provost Sail ho shrouds spirits boom mizzenmast yardarm. Pinnace holystone mizzenmast quarter crow''s nest nipperkin grog yardarm hempen halter furl. Swab barque interloper chantey doubloon starboard grog black jack gangway rutters.','0');
INSERT INTO `content` VALUES ('content-019','block-013',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-expressive/getting-started/features/"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-021::] Lean & Agile','0');
INSERT INTO `content` VALUES ('content-021','block-013',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-refresh"}}','{"html_tag":"i"}','{}',' ','content-019');
INSERT INTO `content` VALUES ('content-022','block-013',2,'template-001','text','{}','{"html_tag":"p"}','{}','Expressive is fast, small and perfect for rapid application development, prototyping and api''s. You decide how you extend it and choose the best packages from major framework or standalone projects.','0');
INSERT INTO `content` VALUES ('content-023','block-015',1,'template-001','text','{"href":"https://github.com/zendframework/zend-diactoros"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-024::] Built-in Themes','0');
INSERT INTO `content` VALUES ('content-024','block-015',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-exchange"}}','{"html_tag":"i"}','{}',' ','content-023');
INSERT INTO `content` VALUES ('content-025','block-015',2,'template-001','text','{}','{"html_tag":"p"}','{}','HTTP messages are the foundation of web development. Web browsers and HTTP clients such as cURL create HTTP request messages that are sent to a web server, which provides an HTTP response message. Server-side code receives an HTTP request message, and returns an HTTP response message.','0');
INSERT INTO `content` VALUES ('content-026','block-016',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-027::] Containers','0');
INSERT INTO `content` VALUES ('content-027','block-016',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-cube"}}','{"html_tag":"i"}','{}',' ','content-026');
INSERT INTO `content` VALUES ('content-028','block-016',2,'template-001','text','{}','{"html_tag":"p"}','{}','Expressive promotes and advocates the usage of Dependency Injection/Inversion of Control containers when writing your applications. Expressive supports multiple containers which typehints against [::content:content-039::].','0');
INSERT INTO `content` VALUES ('content-029','block-019',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-030::] Caching System','0');
INSERT INTO `content` VALUES ('content-030','block-019',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-dot-circle-o"}}','{"html_tag":"i"}','{}',' ','content-029');
INSERT INTO `content` VALUES ('content-031','block-019',2,'template-001','text','{}','{"html_tag":"p"}','{}','Middleware is code that exists between the request and response, and which can take the incoming request, perform actions based on it, and either complete the response or pass delegation on to the next middleware in the queue. Your application is easily extended with custom middleware created by yourself or [::content:content-038::].','0');
INSERT INTO `content` VALUES ('content-032','block-020',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-033::] Various Data Storage','0');
INSERT INTO `content` VALUES ('content-033','block-020',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-plane"}}','{"html_tag":"i"}','{}',' ','content-032');
INSERT INTO `content` VALUES ('content-034','block-020',2,'template-001','text','{}','{"html_tag":"p"}','{}','One fundamental feature of zend-expressive is that it provides mechanisms for implementing dynamic routing, a feature required in most modern web applications. Expressive ships with multiple adapters.','0');
INSERT INTO `content` VALUES ('content-035','block-021',1,'template-001','text','{}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"h2"} }}}','[::content:content-036::] Email Queueing','0');
INSERT INTO `content` VALUES ('content-036','block-021',1,'template-001','icon','{"class":{"0":"fa","1":"fa fa-files-o"}}','{"html_tag":"i"}','{}',' ','content-035');
INSERT INTO `content` VALUES ('content-037','block-021',2,'template-001','text','{}','{"html_tag":"p"}','{}','By default, no middleware in Expressive is templated. We do not even provide a default templating engine, as the choice of templating engine is often very specific to the project and/or organization. However, Expressive does provide abstraction for templating, which allows you to write middleware that is engine-agnostic.','0');
INSERT INTO `content` VALUES ('content-038','block-019',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-expressive/getting-started/features/","target":"_blank"}','{"html_tag":"a"}','{}','others','content-031');
INSERT INTO `content` VALUES ('content-039','block-016',1,'template-001','text','{"href":"https://github.com/container-interop/container-interop","target":"_blank"}','{"html_tag":"a"}','{}','container-interop','content-028');
INSERT INTO `content` VALUES ('content-040','block-020',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-router/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"p"} }}}','Get started with Zend Router.','0');
INSERT INTO `content` VALUES ('content-041','block-021',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-view/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"p"} }}}','Get started with Zend View.','0');
INSERT INTO `content` VALUES ('content-042','block-030',1,'template-001','text','{}','{"html_tag":"hr"}','{}',' ','0');
INSERT INTO `content` VALUES ('content-043','block-030',2,'template-001','text','{}','{"html_tag":"p"}','{}','© 2005 - 2018 by Zend Technologies Ltd. All rights reserved.','0');
INSERT INTO `content` VALUES ('content-044','block-012',NULL,'template-001','text','{"href":"http://google.uk"}','{"html_tag":"a"}','{}','Create Survey','content-017');
INSERT INTO `content` VALUES ('content-045',NULL,3,'template-001','icon','{"class":"fa fa-wrench"}','{"html_tag":"i"}','{}',' ','0');
INSERT INTO `content` VALUES ('content-046','block-031',1,'template-001','text','{"href":"https://docs.zendframework.com/zend-expressive/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','[::content:content-049::] Docs','0');
INSERT INTO `content` VALUES ('content-047','block-031',2,'template-001','text','{"href":"https://github.com/zendframework/zend-expressive","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','[::content:content-050::] Contribute','0');
INSERT INTO `content` VALUES ('content-048','block-031',3,'template-001','text','{"href":"/","target":"_blank"}','{"html_tag":"a"}','{"wrapper":{"outer":{"parameters":{"html_tag":"li"}}}}','Ping Test','0');
INSERT INTO `content` VALUES ('content-049','block-031',1,'template-001','text','{"class":{"0":"fa","1":"fa fa-book"}}','{"html_tag":"i"}','{}',' ','content-046');
INSERT INTO `content` VALUES ('content-050','block-031',1,'template-001','text','{"class":{"0":"fa","1":"fa-wrench"}}','{"html_tag":"i"}','{}',' ','content-047');
DROP TABLE IF EXISTS `route_routes`;
CREATE TABLE IF NOT EXISTS `route_routes` (
    `parent_uid`    TEXT,
    `options`    TEXT,
    `route`    TEXT,
    `scenario`    TEXT,
    `action`    TEXT,
    `controller`    TEXT,
    `submodule`    TEXT,
    `module`    TEXT,
    `uid`    TEXT,
    `route_uid`    TEXT,
    `name`    TEXT,
    `constraints`    TEXT,
    `methods`    TEXT
);
INSERT INTO `route_routes` VALUES ('0','{''defaults'':{}}','/','display','index','ApplicationIndex','route','singlepageapplication','route-route-001','route-001','home','{}','{''defaults'':{}}');
INSERT INTO `route_routes` VALUES ('0','','/page','display','display','App\Action\HomePageAction','','route','route-route-004','route-004','page','{}','{ "bar": "baz" }');
INSERT INTO `route_routes` VALUES (NULL,'{}','/name',NULL,NULL,'App\Action\HomePageAction',NULL,NULL,NULL,NULL,'api.ping','{}','{}');
INSERT INTO `route_routes` VALUES ('0','{''defaults'':{}}','/template/001.html','display','index','ApplicationIndex','route','singlepageapplication','route-route-010','route-010','template_001','{}','{}');
INSERT INTO `route_routes` VALUES ('0','{}','/login','display','index','ApplicationIndex','route','route','route-route-login','route-login','login','{}','{}');
DROP TABLE IF EXISTS `route_acl`;
CREATE TABLE IF NOT EXISTS `route_acl` (
    `route_name`    VARCHAR(64) NOT NULL,
    `role`    VARCHAR(64) NOT NULL,
    `permission`    INT(1) NOT NULL
);
INSERT INTO `route_acl` VALUES ('home','guest',1);
INSERT INTO `route_acl` VALUES ('home','guest',1);
INSERT INTO `route_acl` VALUES ('auth_login','guest',1);
INSERT INTO `route_acl` VALUES ('auth_login','member',0);
INSERT INTO `route_acl` VALUES ('auth_login_process','guest',1);
INSERT INTO `route_acl` VALUES ('auth_login_process','member',0);
INSERT INTO `route_acl` VALUES ('auth_register','guest',1);
INSERT INTO `route_acl` VALUES ('auth_register','member',0);
INSERT INTO `route_acl` VALUES ('auth_register_process','guest',1);
INSERT INTO `route_acl` VALUES ('auth_register_process','member',0);
INSERT INTO `route_acl` VALUES ('auth_logout','guest',0);
INSERT INTO `route_acl` VALUES ('auth_logout','member',1);
INSERT INTO `route_acl` VALUES ('page_create','guest',0);
INSERT INTO `route_acl` VALUES ('page_create','member',1);
INSERT INTO `route_acl` VALUES ('page_read','guest',1);
INSERT INTO `route_acl` VALUES ('page_read','guest',1);
INSERT INTO `route_acl` VALUES ('page_update','guest',0);
INSERT INTO `route_acl` VALUES ('page_update','member',1);
INSERT INTO `route_acl` VALUES ('page_delete','guest',0);
INSERT INTO `route_acl` VALUES ('page_delete','member',1);
INSERT INTO `route_acl` VALUES ('area_create','guest',0);
INSERT INTO `route_acl` VALUES ('area_create','guest',0);
INSERT INTO `route_acl` VALUES ('area_read','guest',1);
INSERT INTO `route_acl` VALUES ('area_read','guest',1);
INSERT INTO `route_acl` VALUES ('area_update','guest',0);
INSERT INTO `route_acl` VALUES ('area_update','guest',0);
INSERT INTO `route_acl` VALUES ('area_delete','member',0);
INSERT INTO `route_acl` VALUES ('area_delete','member',0);
INSERT INTO `route_acl` VALUES ('block_create','member',0);
INSERT INTO `route_acl` VALUES ('block_create','member',0);
INSERT INTO `route_acl` VALUES ('block_read','member',1);
INSERT INTO `route_acl` VALUES ('block_read','member',1);
INSERT INTO `route_acl` VALUES ('block_update','member',0);
INSERT INTO `route_acl` VALUES ('block_update','member',0);
INSERT INTO `route_acl` VALUES ('block_delete','member',0);
INSERT INTO `route_acl` VALUES ('block_delete','member',0);
INSERT INTO `route_acl` VALUES ('content_create','member',0);
INSERT INTO `route_acl` VALUES ('content_create','member',0);
INSERT INTO `route_acl` VALUES ('content_read','member',1);
INSERT INTO `route_acl` VALUES ('content_read','member',1);
INSERT INTO `route_acl` VALUES ('content_update','member',0);
INSERT INTO `route_acl` VALUES ('content_update','member',0);
INSERT INTO `route_acl` VALUES ('content_delete','member',0);
INSERT INTO `route_acl` VALUES ('content_delete','member',0);
DROP TABLE IF EXISTS `acl`;
CREATE TABLE IF NOT EXISTS `acl` (
    `uid`    VARCHAR(64),
    `name`    VARCHAR(32),
    `label`    VARCHAR(255),
    PRIMARY KEY(`uid`)
);
INSERT INTO `acl` VALUES ('4cce19f0-0e9b-4181-aaa5-ce2a29cab97b','guest','Guest');
INSERT INTO `acl` VALUES ('3e0fbdff-b266-49d8-ac88-aaec6e373a20','member','Member');
DROP TABLE IF EXISTS `rbac_users`;
CREATE TABLE IF NOT EXISTS `rbac_users` (
    `user_uid`    TEXT,
    `role_uid`    TEXT
);
INSERT INTO `rbac_users` VALUES ('1','3');
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `uid`    TEXT,
    `username`    TEXT,
    `password`    TEXT,
    `created_at`    TEXT,
    `updated_at`    TEXT
);
INSERT INTO `users` VALUES ('1','jan@kowalski.name','moloko',NULL,NULL);
DROP TABLE IF EXISTS `form_fieldset`;
CREATE TABLE IF NOT EXISTS `form_fieldset` (
    `uid`    TEXT,
    `form_uid`    TEXT,
    `name`    TEXT,
    `type`    TEXT,
    `attributes`    TEXT,
    `options`    TEXT,
    `parameters`    TEXT,
    `priority`    INTEGER
);
INSERT INTO `form_fieldset` VALUES ('dQj T pHo','lHlCIFRgbv','AsaEkgRzIf','UH hVCRHTx','UZ INSHasH','vodQk kXuN','SxJVShM c',1895244856);
INSERT INTO `form_fieldset` VALUES ('mTrunNxXQP','JJsX JRQil','rqFBwayv P','NubHkHYOfZ','mvVxstKjvh','VaHOuTXoEW','oppvRNBYqN',1122215465);
DROP TABLE IF EXISTS `rbac`;
CREATE TABLE IF NOT EXISTS `rbac` (
    `role_id`    INTEGER,
    `parent_role_id`    TEXT,
    `role_name`    TEXT
);
INSERT INTO `rbac` VALUES (2,'0','guest');
INSERT INTO `rbac` VALUES (3,'0','admin');
INSERT INTO `rbac` VALUES (4,'0','editor');
INSERT INTO `rbac` VALUES (5,'0','developer');
INSERT INTO `rbac` VALUES (6,'0','member');
DROP TABLE IF EXISTS `seo`;
CREATE TABLE IF NOT EXISTS `seo` (
    `description`    TEXT,
    `page_uid`    TEXT,
    `title`    TEXT,
    `keywords`    TEXT,
    `uid`    TEXT
);
INSERT INTO `seo` VALUES ('homepage description','page-001','eCancer Homepage','keyword-1, keyword-2','seo-001');
INSERT INTO `seo` VALUES ('/authenticate','b1360a73-3ded-4a51-93d1-dce5887d9b70','/authenticate','/authenticate','c1f591ec-f2b9-414b-ba53-9b097ed0496f');
INSERT INTO `seo` VALUES ('/authenticate','130308e9-0738-4597-888b-226445328ee2','/authenticate','/authenticate','5bdd1581-6b93-4da0-9523-625a17c6ef80');
INSERT INTO `seo` VALUES ('/authenticate','6d7418b2-23a0-45f1-8000-ca14a7f8321b','/authenticate','/authenticate','6eb4de1a-1d50-48f1-88d7-127169706385');
INSERT INTO `seo` VALUES ('/authenticate','de48f111-a83a-47fc-af61-6c2369f6ff95','/authenticate','/authenticate','e48dcc53-05d1-4a80-a73d-5cc89137f0c1');
INSERT INTO `seo` VALUES ('/test','aa670020-9717-4b64-b57d-f79ff1dcfca7','/test','/test','ef4ad825-b013-4ab0-8732-c292cbbc58b0');
INSERT INTO `seo` VALUES ('/test','e4dbaba0-132c-467b-b28f-6dd0e1debeb9','/test','/test','cc03ea13-8cc1-47f3-bb37-f6b651407c0c');
INSERT INTO `seo` VALUES ('/test','19c6f563-66e6-4d82-b1e2-de79296928b8','/test','/test','ae5e9e82-cf11-4457-9810-f4f7ec1ae052');
INSERT INTO `seo` VALUES ('/test-001','34262337-3a31-4f20-a2a7-0809a68987c5','/test-001','/test-001','d30012aa-9421-44b5-9215-5819f796e5c3');
INSERT INTO `seo` VALUES ('/test-001','64d8220f-8365-4b9f-8af7-23e85ca9a3a0','/test-001','/test-001','4e7943d6-612c-4ba6-86f9-3fc5c772d0dd');
INSERT INTO `seo` VALUES ('/test-001','93d38dff-668d-4c47-93c0-49713178223e','/test-001','/test-001','c3b9789b-3946-4223-afd6-c0b38e795def');
INSERT INTO `seo` VALUES ('/test-001','826b5583-cabc-44e3-bdf4-db9cb9da86db','/test-001','/test-001','35fec6f1-48fe-4728-b82e-4dca7ecf2d6f');
INSERT INTO `seo` VALUES ('/test-001','ee04fe59-6ed7-41ab-bc26-65763ad9f94b','/test-001','/test-001','1d2b1793-9921-465b-a4e7-f77e14497ff3');
INSERT INTO `seo` VALUES ('/test-001','fb129c81-fabd-4e1c-8ea5-8a8e8a3adc98','/test-001','/test-001','8ef6cebf-924b-48ea-bb1b-20e65fb25ed5');
INSERT INTO `seo` VALUES ('/test-001','5c5e023d-0bb7-40d4-b269-f2ffbffd7050','/test-001','/test-001','c7d17c90-8a6c-42f0-9437-de4f631f6830');
INSERT INTO `seo` VALUES ('/test-001','36f614c0-5e9d-480e-9462-1b2e149c6610','/test-001','/test-001','96dec7e0-43a0-473c-99ae-dc53b8dc0f2b');
INSERT INTO `seo` VALUES ('/test-001','0ebf0348-c22d-4b55-bfd3-db3f8cc3dffa','/test-001','/test-001','8812f903-0f4c-49ad-b123-31f63c9c3a1c');
INSERT INTO `seo` VALUES ('/test-001','9661e591-3f60-4cc5-a88d-a0abf0e91710','/test-001','/test-001','ef277496-335e-4725-bbbd-29406931e5d9');
INSERT INTO `seo` VALUES ('/test-001','482ae0ca-070c-462c-9a57-8936d3f1472a','/test-001','/test-001','0d881852-2c2c-4793-83b3-f628cf775797');
INSERT INTO `seo` VALUES ('/test-001','234ff6a1-7766-4fa5-a893-81ee1ed11a63','/test-001','/test-001','6c5f5b43-fa50-447b-8b8c-f3afe75bc9c5');
INSERT INTO `seo` VALUES ('/twohhhh','6fce78c2-8970-4e8d-b6ef-200b4917fd19','/twohhhh','/twohhhh','a2e08bec-678a-4957-ab87-79e39964ca69');
INSERT INTO `seo` VALUES ('','fd21597b-cbac-425f-b8db-c6e91646da72','hgkhjk','','07840512-3856-48aa-869b-58557789b8ca');
INSERT INTO `seo` VALUES ('/url','0f8ed3a3-ed86-43c1-bcb7-701bbfe06c3c','/url','/url','28a05ae6-a2ed-4698-8d45-e9d5ada08285');
INSERT INTO `seo` VALUES ('/url','601e6b19-647a-4648-a809-99884836cf36','/url','/url','43b0af5f-e5b5-4490-8616-ecf771025052');
INSERT INTO `seo` VALUES ('/url','f643a8fa-874c-4ead-ab08-dfa7be5a9e9e','/url','/url','52a38a36-c453-4100-b02d-2c70c9aa0344');
INSERT INTO `seo` VALUES ('/url','6c4d7885-0087-4f66-a1e6-95f77a8da2c1','/url','/url','61ce39d7-1b5e-4f9f-9320-6d06774167e1');
INSERT INTO `seo` VALUES ('/url','1d5805a1-ab9d-4495-95a8-c9695dc20d56','/url','/url','5bc1c98c-fd80-4ccc-a219-ca7f4d846580');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','5b46c600-5edf-49bb-aa6a-73804f84b141','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','320844e3-cbaf-4d36-a128-b6ba1fe088e3');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','e387617b-64aa-430d-b197-275bd0c9da3b','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','27b6f959-51e3-4980-ac05-5d64bf45064a');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','e1a76e88-4874-424f-ad70-320ce2b62cbe','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','d0447cf3-99b4-45c0-a319-1adc205d756e');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','97799d3c-e7d0-4281-9a20-787e74f9e210','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','693f0295-7d9e-4e89-8275-a51e5dc78444');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','e56eb87f-b951-448c-96f8-c00bb24f9ccf','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','ebcdaad3-6cfb-4e9b-94a4-939e11dbd0d9');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','bde7cda7-8af7-4428-9228-3a9a7d353b0d','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','effa00cb-0d53-43e8-b930-54339735e108');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','65437317-db94-4011-a74d-4d884ac38830','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','252f9159-0051-4ad9-950e-04c0a21df3b1');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','93a9717e-9ab0-4ad1-aff7-44182646b382','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','a4c60900-b540-4cbb-bfb7-44e7f487bcb1');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','9b6aa2c9-ba2c-4539-84dc-88d73a1db95c','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','df0cc749-b6a5-4d3d-9ea2-d932608639a3');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','4ee2f5c8-89a0-4964-8b5f-383f21b08e1b','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','ae7281e5-e91c-414e-b108-3ea8ebc80e52');
INSERT INTO `seo` VALUES ('/jnsfkjsd-2asdfasdf','c2714848-974b-4098-8809-4d8f4ce9fa0a','/jnsfkjsd-2asdfasdf','/jnsfkjsd-2asdfasdf','8f025bc9-4519-49ed-9903-fcf4e7abea66');
DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
    `label`    TEXT,
    `uid`    text,
    `name`    text,
    `type`    text,
    `location`    text
);
INSERT INTO `template` VALUES (NULL,'template-001','home-page','view','app');
INSERT INTO `template` VALUES (NULL,'template-005','template_full','view',NULL);
DROP TABLE IF EXISTS `form_element_input`;
CREATE TABLE IF NOT EXISTS `form_element_input` (
    `uid`    TEXT,
    `form_element_uid`    TEXT,
    `name`    TEXT,
    `required`    NUMERIC,
    `options`    TEXT,
    `attributes`    TEXT,
    `parameters`    TEXT
);
INSERT INTO `form_element_input` VALUES ('form-element-filter-001','form-001','not_empty',1,'{}','{}','{}');
DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
    `uid`    TEXT,
    `name`    TEXT,
    `attributes`    TEXT,
    `options`    TEXT,
    `parameters`    TEXT
);
INSERT INTO `form` VALUES ('form-001','editor_login','{"class":{"0":"form-signin"}}','{}','{}');
INSERT INTO `form` VALUES ('form-002','content_create','{"class":{"0":"form-content-create"}}','{}','{}');
DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
    `page_cache`    TEXT,
    `route_url`    TEXT,
    `uid`    text,
    `name`    text,
    `template`    text,
    `route`    text
);
INSERT INTO `page` VALUES ('0','/','page-001','home','template-001','route-001');
INSERT INTO `page` VALUES ('0','/page','page-004','page','template-005','route-004');
INSERT INTO `page` VALUES ('0','/template/001.html','page-010','template_001','template-001','route-010');
INSERT INTO `page` VALUES ('0','/login','page-login','login','template-001','route-login');
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
    `module`    TEXT,
    `name`    text(32),
    `value`    text
);
INSERT INTO `configuration` VALUES (NULL,'title','eCancer Content');
INSERT INTO `configuration` VALUES (NULL,'description','Single Page Application 01');
INSERT INTO `configuration` VALUES (NULL,'keywords','SPA, Single Page');
INSERT INTO `configuration` VALUES ('cache','cache_db','1');
INSERT INTO `configuration` VALUES ('cache','cache_api','1');
INSERT INTO `configuration` VALUES ('cache','cache_action','1');
INSERT INTO `configuration` VALUES ('cache','cache_fullpage','1');
INSERT INTO `configuration` VALUES ('cache','cache_settings_status','1');
INSERT INTO `configuration` VALUES ('cache','cache_route','1');
DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE IF NOT EXISTS `menu_item` (
    `item_order`    TEXT,
    `location`    TEXT,
    `status`    TEXT,
    `label`    TEXT,
    `menu_uid`    TEXT
);
DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
    `uid`    text,
    `template`    text,
    `machine_name`    text,
    `attributes`    text,
    `parameters`    text,
    `options`    text,
    `scope`    text
);
INSERT INTO `area` VALUES ('area-001','template-001','logo_area','{}','{}','{}','global');
INSERT INTO `area` VALUES ('area-006','template-001','content_main_jumbotron','{"class":{"0":"jumbotron"}}','{"html_tag":"div"}','{}','page');
INSERT INTO `area` VALUES ('area-007','template-001','content_main','{}','{"html_tag":"div"}','{}','page');
INSERT INTO `area` VALUES ('area-004','template-001','footer','{"class":{"0":"container"}}','{"html_tag":"div"}','{}','global');
INSERT INTO `area` VALUES ('area-009','template-001','menu_main','{"class":{"0":"collapse navbar-collapse"}}','{"html_tag":"div"}','{}','global');
DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
    `uid`    text,
    `route_name`    text
);
INSERT INTO `route` VALUES ('route-001','home');
INSERT INTO `route` VALUES ('route-004','page');
INSERT INTO `route` VALUES ('route-010','template_001');
INSERT INTO `route` VALUES ('route-login','login');
