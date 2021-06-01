--
-- Table structure for table `carts`
--

CREATE TABLE `wishlist` (
  `listID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `artworkID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `carts`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`listID`);

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `wishlist`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT;
