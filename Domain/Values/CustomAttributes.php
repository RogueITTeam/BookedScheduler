<?php
/**
 * Copyright 2013 Nick Korbel
 *
 * This file is part of phpScheduleIt.
 *
 * phpScheduleIt is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * phpScheduleIt is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with phpScheduleIt.  If not, see <http://www.gnu.org/licenses/>.
 */

class CustomAttributes
{
	private $attributes = array();

	/**
	 * @param string $attributes
	 * @return UserPreferences
	 */
	public static function Parse($attributes)
	{
		$ca = new CustomAttributes();

		if (empty($attributes))
		{
			return $ca;
		}

		$pairs = explode(',', $attributes);

		foreach ($pairs as $pair)
		{
			$nv = explode('=', $pair);
			$ca->Add($nv[0], $nv[1]);
		}

		return $ca;
	}

	/**
	 * @param $name string
	 * @param $value string
	 */
	public function Add($name, $value)
	{
		$this->attributes[$name] = $value;
	}

	/**
	 * @param $id int
	 * @return null|string
	 */
	public function Get($id)
	{
		if (array_key_exists($id, $this->attributes))
		{
			return $this->attributes[$id];
		}

		return null;
	}

	/**
	 * @return array|string[]
	 */
	public function All()
	{
		return $this->attributes;
	}
}