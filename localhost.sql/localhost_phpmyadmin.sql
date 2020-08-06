--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- RELATIONS FOR TABLE `pma__bookmark`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- RELATIONS FOR TABLE `pma__central_columns`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

--
-- RELATIONS FOR TABLE `pma__column_info`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- RELATIONS FOR TABLE `pma__designer_settings`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- RELATIONS FOR TABLE `pma__export_templates`:
--

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'table', '1', '{"quick_or_custom":"quick","what":"sql","allrows":"1","output_format":"sendit","filename_template":"@TABLE@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","xml_structure_or_data":"data","xml_export_events":"something","xml_export_functions":"something","xml_export_procedures":"something","xml_export_tables":"something","xml_export_triggers":"something","xml_export_views":"something","xml_export_contents":"something","mediawiki_structure_or_data":"data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","codegen_structure_or_data":"data","codegen_format":"0","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","pdf_report_title":"","pdf_structure_or_data":"data","yaml_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"Structure of table @TABLE@","latex_structure_continued_caption":"Structure of table @TABLE@ (continued)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"Content of table @TABLE@","latex_data_continued_caption":"Content of table @TABLE@ (continued)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","json_structure_or_data":"data","phparray_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","":null,"lock_tables":null,"htmlword_columns":null,"ods_columns":null,"excel_removeCRLF":null,"excel_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"csv_removeCRLF":null,"csv_columns":null,"json_pretty_print":null,"texytext_columns":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

--
-- RELATIONS FOR TABLE `pma__favorite`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

--
-- RELATIONS FOR TABLE `pma__history`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- RELATIONS FOR TABLE `pma__navigationhiding`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- RELATIONS FOR TABLE `pma__pdf_pages`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- RELATIONS FOR TABLE `pma__recent`:
--

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"PlacementHub","table":"MentorRatings"},{"db":"PlacementHub","table":"StudentAuth"},{"db":"PlacementHub","table":"stories"},{"db":"PlacementHub","table":"mcq_test_question_bank"},{"db":"PlacementHub","table":"essay_test_question_bank"},{"db":"PlacementHub","table":"MentorData"},{"db":"PlacementHub","table":"StudentData"},{"db":"PlacementHub","table":"EssayWriting"},{"db":"PlacementHub","table":"cvcheckUpload"},{"db":"PlacementHub","table":"gd_room_creator"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- RELATIONS FOR TABLE `pma__relation`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

--
-- RELATIONS FOR TABLE `pma__savedsearches`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- RELATIONS FOR TABLE `pma__table_coords`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- RELATIONS FOR TABLE `pma__table_info`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- RELATIONS FOR TABLE `pma__table_uiprefs`:
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'PlacementHub', 'PersonalInterview', '{"CREATE_TIME":"2019-11-29 14:14:11","col_visib":["1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"],"sorted_col":"`PersonalInterview`.`schedule` ASC","col_order":["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18"]}', '2019-11-30 12:42:02'),
('root', 'PlacementHub', 'StudentAuth', '{"sorted_col":"`StudentAuth`.`status` ASC"}', '2019-10-20 12:40:47'),
('root', 'PlacementHub', 'StudentData', '{"sorted_col":"`StudentData`.`registration_no`  ASC"}', '2019-11-27 11:49:22'),
('root', 'PlacementHub', 'cvcheckUpload', '{"sorted_col":"`cvcheckUpload`.`mentorsize`  DESC"}', '2019-11-11 10:33:01'),
('root', 'PlacementHub', 'gd_feedback', '{"sorted_col":"`gd_feedback`.`group_name` ASC"}', '2019-11-27 12:03:59'),
('root', 'PlacementHub', 'mentor_subject_list', '{"sorted_col":"`mentor_subject_list`.`subject_name` ASC"}', '2019-12-02 20:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

--
-- RELATIONS FOR TABLE `pma__tracking`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- RELATIONS FOR TABLE `pma__userconfig`:
--

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-10-19 09:52:43', '{"collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

--
-- RELATIONS FOR TABLE `pma__usergroups`:
--

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- RELATIONS FOR TABLE `pma__users`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for pma__bookmark
--

--
-- Metadata for pma__central_columns
--

--
-- Metadata for pma__column_info
--

--
-- Metadata for pma__designer_settings
--

--
-- Metadata for pma__export_templates
--

--
-- Metadata for pma__favorite
--

--
-- Metadata for pma__history
--

--
-- Metadata for pma__navigationhiding
--

--
-- Metadata for pma__pdf_pages
--

--
-- Metadata for pma__recent
--

--
-- Metadata for pma__relation
--

--
-- Metadata for pma__savedsearches
--

--
-- Metadata for pma__table_coords
--

--
-- Metadata for pma__table_info
--

--
-- Metadata for pma__table_uiprefs
--

--
-- Metadata for pma__tracking
--

--
-- Metadata for pma__userconfig
--

--
-- Metadata for pma__usergroups
--

--
-- Metadata for pma__users
--

--
-- Metadata for phpmyadmin
--
