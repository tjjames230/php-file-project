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
		read_file();
		command();
	} else if ($user_response == 4) {
		edit_file();
		command();
	} else if ($user_response == 5) {
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

	echo "Enter file contents: ";
	$file_contents = trim(fgets(STDIN));

	file_put_contents($full_path, $file_contents);

	echo "File '$file_name' created successfully.";
}

function read_file()
{
	echo "What file do you want to see the contents of?\n";
	$file_name = trim(fgets(STDIN));

	$folder_path = "files_output";
	$full_path = $folder_path . DIRECTORY_SEPARATOR . $file_name;

	$handle = fopen($full_path, "r");
	$contents = fread($handle, filesize($full_path));
	echo $contents;
	fclose($handle);
}

function edit_file()
{
	echo "What file do you want to edit?\n";
	$file_name = trim(fgets(STDIN));

	echo "What content do you want to add?\n";
	$file_contents = trim(fgets(STDIN));

	$folder_path = "files_output";
	$full_path = $folder_path . DIRECTORY_SEPARATOR . $file_name;

	$handle = fopen($full_path, "w");

	if (is_writable($full_path)) {
		fwrite($handle, $file_contents);
		echo "file was successfully updated with new content";
	} else {
		echo "file is not editable";
	}

	fclose($handle);
}

function read_options()
{
	echo "\nWhat would you like to do?\n";
	echo "
	1: Create New File
	2: Rename File
	3: Read File
	4: Edit File
	5: Close App\n";
}

function open_file()
{
}

command();
