

--
-- Database: `sparrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `epic_logs`
--

CREATE TABLE `epic_logs` (
`id` int(11) NOT NULL,
`request_id` int(11) DEFAULT NULL,
`manager_name` varchar(255) NOT NULL,
`newhire_name` varchar(255) NOT NULL,
`template_id` int(11) NOT NULL,
`jira_ticket` varchar(255) NOT NULL,
`start_date` date DEFAULT NULL,
`create_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`response_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
`id` int(10) NOT NULL,
`title` varchar(200) NOT NULL,
`description` varchar(2500) NOT NULL,
`group_name` varchar(50) NOT NULL,
`assignee` varchar(50) NOT NULL DEFAULT 'New Hire',
`visible` varchar(255) NOT NULL DEFAULT 'true',
`last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `epic_logs`
--
ALTER TABLE `epic_logs`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `epic_logs`
--
ALTER TABLE `epic_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
