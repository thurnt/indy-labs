<?php

require_once(MODEL_PATH . "/index.php");

function checkDBModel($name)
{
  switch ($name) {
    case 'project':
      return new ProjectModel();
    case 'task':
      return new TaskModel();
    case 'calendar':
      return new CalendarModel();
    case 'todo':
      return new TodoModel();
    case 'note':
      return new NoteModel();
    case 'target':
      return new TargetModel();
    case 'job_skills':
      return new JobSkillsModel();

    default:
      return new UserModel();
  }
}
