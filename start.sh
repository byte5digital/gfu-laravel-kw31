#!/bin/bash
docker compose -f docker-compose.yml -p gfu up --build --remove-orphans
