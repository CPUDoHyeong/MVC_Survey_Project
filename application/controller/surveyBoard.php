<?php

class SurveyBoard extends Controller {
	public function whole_survey() {
		require 'application/views/_templates/header.php';
		require 'application/views/surveyBoard/survey_nav.php';
		require 'application/views/surveyBoard/whole_survey.php';
	}

	public function on_survey() {
		require 'application/views/_templates/header.php';
		require 'application/views/surveyBoard/survey_nav.php';
	}

	public function off_survey() {
		require 'application/views/_templates/header.php';
		require 'application/views/surveyBoard/survey_nav.php';
	}

	public function make_survey() {
		require 'application/views/_templates/header.php';
		require 'application/views/surveyBoard/survey_nav.php';
	}
}

?>