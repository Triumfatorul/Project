read -p "What's the name of migration?" ANSWER

# Check if user inser an answer
# If he doesn't insert an answer stop the script
# If he insert an answer move forward 

if [  -z $ANSWER ]
  then
    echo "Please insert a name for migration!"
  else

    # If Answer have spaces remove them
    ANSWER="$(echo -e "${ANSWER}" | tr -d '[:space:]')"




    # Check if the file already exist
    # If exist stop the script
    # if doesn't exist go forward

    if [ -e Migration/${ANSWER}.php ]
    then
        echo "Migration already exists!"
    else
        # Create a blueprint for migration

        BLUEPRINT="<?php

class "${ANSWER}" {
    private static \$query;

    public static function set_query() {
        // Your query..

        return self::\$query;
    }
}"

        # Check if the Migration directory doesn't exist
        # If doesn't exist create it
        # If exist move forward
        if [ ! -d "Migration" ]
        then
        mkdir "Migration"
        fi

        # Create the file and  insert the blueprint

        touch "Migration/${ANSWER}.php"
        echo "$BLUEPRINT" >> "Migration/${ANSWER}.php"
        echo "Migration created!"
    fi
fi