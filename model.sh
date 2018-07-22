read -p "What's the name of model?" ANSWER

# Check if user inser an answer
# If he doesn't insert an answer stop the script
# If he insert an answer move forward 

if [  -z $ANSWER ]
  then
    echo "Please insert a name for model!"
  else

    # If Answer have spaces remove them
    ANSWER="$(echo -e "${ANSWER}" | tr -d '[:space:]')"

    # Capitalize the first letter 
    ANSWER="$(tr '[:lower:]' '[:upper:]' <<< ${ANSWER:0:1})${ANSWER:1}"


    # Check if the file already exist
    # If exist stop the script
    # if doesn't exist go forward

    if [ -e Model/${ANSWER}Model.php ]
    then
        echo "Model already exists!"
    else
        # Create a blueprint for model

        BLUEPRINT="<?php

 
class "${ANSWER}"Model {
     // Your code..
}"

        # Check if the Model directory doesn't exist
        # If doesn't exist create it
        # If exist move forward
        if [ ! -d "Model" ]
        then
        mkdir "Model"
        fi

        # Create the file and  insert the blueprint

        touch "Model/${ANSWER}Model.php"
        echo "$BLUEPRINT" >> "Model/${ANSWER}Model.php"
        echo "Model created!"
    fi
fi