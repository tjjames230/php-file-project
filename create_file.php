<?php
include 'classes/class_file.php';
include './all_files.php';

function command()
{
	read_options();
	$user_response = trim(fgets(STDIN));

	if ($user_response == 1) {
		create_file();
		command();
	} else if ($user_response == 2) {
		echo "the user response was 2";
		command();
	} else if ($user_response == 3) {
		exit();
	} else {
		echo "not an acceptable input";
		command();
	}
}

function create_file()
{
	echo "Enter the file name: ";
	$file_name = trim(fgets(STDIN));

	$folder_path = "files_output";

	$full_path = $folder_path . DIRECTORY_SEPARATOR . $file_name;

	file_put_contents($full_path, "example content");

	echo "File '$file_name' created successfully.";
}

function read_options()
{
	echo "\nWhat would you like to do?\n";
	echo "
	1: Create New File
	2: Rename File
	3: Close App\n";
}

function open_file()
{
}

command();
