<?
  class Engine {
    var $input;
    function gulp() {
      echo "Gulp.";
    }
    function Engine() { }
    function execute() {
      $s = $this->retrieveState();
      if ($s->isEmpty() || $this->reset()) {
        $this->initializeState($s);
      } else {
        $this->updateState($s);
      }
      $this->saveState($s);
      $this->reportState($s);
      $this->getReadyforMoreInput();
    }
    function retrieveState() {
      return new State();
    }
    function initializeState($s) {

    }
    function updateState($s) {

    }
    function saveState($s) {

    }
    function reportState($s) {

    }
    function getReadyForMoreInput() {

    }
    function reset() {
      return false;
    }
  }

  class State {
    function isEmpty() {
      return true;
    }
  }
 ?>

