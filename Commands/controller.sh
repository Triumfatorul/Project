read -p "What's the name of controller?" ANSWER

# Check if user insert an answer
# If he doesn't insert an answer stop the script
# If he insert an answer move forward 

if [  -z $ANSWER ]
  then
    echo "Please insert a name for controller!"
  else

    # If Answer have spaces remove them
    ANSWER="$(echo -e "${ANSWER}" | tr -d '[:space:]')"

    # Capitalize the first letter 
    ANSWER="$(tr '[:lower:]' '[:upper:]' <<< ${ANSWER:0:1})${ANSWER:1}"


    # Check if the file already exist
    # If exist stop the script
    # if doesn't exist go forward

    if [ -e Controller/${ANSWER}Controller.php ]
    then
        echo "Controller already exists!"
    else
        # Create a blueprint for controller

        BLUEPRINT="<?php

class "${ANSWER}"Controller {
     // Your code..
}"

        # Check if the Controller directory doesn't exist
        # If doesn't exist create it
        # If exist move forward
        if [ ! -d "Controller" ]
        then
        mkdir "Controller"
        fi

        # Create the file and  insert the blueprint

        touch "Controller/${ANSWER}Controller.php"
        echo "$BLUEPRINT" >> "Controller/${ANSWER}Controller.php"
        echo "Controller created!"
    fi
fi