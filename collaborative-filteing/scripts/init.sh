#!/bin/bash


#installing netcat tool:

apt-get update && apt-get install -y netcat
# Wait for Cassandra to start
echo "Waiting for Cassandra to start..."

# wait for 1 second before checking again
while ! nc -z cassandra 9042; do
    sleep 1
done
echo "Cassandra started"

# Execute CQL file(s)
echo "Executing CQL scripts..."
timeout 400 cqlsh -f /scripts/init-database.cql cassandra
echo "CQL scripts executed successfully"
