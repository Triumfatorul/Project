read -p "What's the name of view?" ANSWER

# Check if user inser an answer
# If he doesn't insert an answer stop the script
# If he insert an answer move forward 

if [  -z $ANSWER ]
  then
    echo "Please insert a name for view!"
  else

    # If Answer have spaces remove them
    ANSWER="$(echo -e "${ANSWER}" | tr -d '[:space:]')"

    # Capitalize the first letter 
    ANSWER="$(tr '[:lower:]' '[:upper:]' <<< ${ANSWER:0:1})${ANSWER:1}"


    # Check if the file already exist
    # If exist stop the script
    # if doesn't exist go forward

    if [ -e View/${ANSWER}View.php ]
    then
        echo "View already exists!"
    else
        # Create a blueprint for view

        BLUEPRINT="<?php
 
class "${ANSWER}" {
     // Your code..
}"

        # Check if the View directory doesn't exist
        # If doesn't exist create it
        # If exist move forward
        if [ ! -d "View" ]
        then
        mkdir "View"
        fi

        # Create the file and  insert the blueprint

        touch "View/${ANSWER}View.php"
        echo "$BLUEPRINT" >> "View/${ANSWER}View.php"
        echo "View created!"
    fi
fi