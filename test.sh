#!/bin/sh

phpunit LevelA;
LEVELA=$?;
SCORE=0;
if [ $LEVELA = 0 ]; then
        SCORE=5;
fi

phpunit LevelB;
LEVELB=$?;
if [ $LEVELB = 0 ]; then
        SCORE=$((SCORE+7));
fi

phpunit LevelC;
LEVELC=$?;
if [ $LEVELC = 0 ]; then
        SCORE=$((SCORE+10));
fi

phpunit LevelD;
LEVELD=$?;
if [ $LEVELD = 0 ]; then
        SCORE=$((SCORE+18));
fi

phpunit LevelE;
LEVELE=$?;
if [ $LEVELE = 0 ]; then
        SCORE=$((SCORE+30));
fi

phpunit LevelF;
LEVELF=$?;
if [ $LEVELF = 0 ]; then
        SCORE=$((SCORE+50));
fi

phpunit LevelG;
LEVELG=$?;
if [ $LEVELG = 0 ]; then
        SCORE=$((SCORE+80));
fi

NAME='plop';
if [ $1 ]; then
        NAME=$1;
fi

echo "SCORE:"$SCORE
